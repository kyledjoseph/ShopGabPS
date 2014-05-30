<?php

class Model_Professional extends \Orm\Model {

  const SUSPENDED_PRICING_PLAN = 0;
  const TRIAL_PRICING_PLAN = 1;
  const PAID_PRICING_PLAN = 2;

  protected static $_properties = array(
    'id',
    'user_id',
    'pricing_plan_type',
    'pricing_plan_started_on',
    'automatic_plan_renewal',
    'automatic_plan_notification_sent',
    'price'
  );

  protected static $_belongs_to = array(
    'user' => array(
      'key_from' => 'user_id',
      'model_to' => 'Model_User',
      'key_to' => 'id',
      'cascade_save' => true,
      'cascade_delete' => false,
    ),
  );

  /**
   * Return verbose name of the pricing plan
   * @return string
   */
  public function getVerbosePricingPlanType() {
    switch ($this->pricing_plan_type) {
      case self::SUSPENDED_PRICING_PLAN:
        return 'Suspended';
        break;
      case self::TRIAL_PRICING_PLAN:
        return 'Trial' . ' ' . $this->getSubscriptionDaysLeft() . ' day(s) left';
        break;
      case self::PAID_PRICING_PLAN:
        return 'Active' . ' ' . $this->getSubscriptionDaysLeft() . ' day(s) left';
        break;
      default:
        return 'Unknown';
    } // switch
  } // getVerboseAccountType

  function getSubscriptionDaysLeft() {
    $expire_time = (int)$this->pricing_plan_started_on + (30 * 24 * 60 * 60);
    $time_left = $expire_time - time();

    return ceil($time_left / (60 * 60 * 24));
  } // getSubscriptionDaysLeft

  /**
   * Get all professional clients
   * @return Model_Client[]
   */
  function getClients() {
    return Model_Client::query()->where('parent_id', $this->user_id)->get();
  } // getClients

  /**
   * Cached value for model user
   * @var Model_User|null
   */
  private $user_model = null;
  function getUser() {
    if (!($this->user_model instanceof Model_User)) {
      $this->user_model = Model_User::get_by_id($this->user_id);
    } // if

    return $this->user_model;
  } // getUser

  /**
   * Notify professional user that his paypal could not get through and that his subscription is not renewed
   */
  public function notifyPaypalFailed() {
    Service_Email::send(array(
      'type'      => 'client_notifications',
      'to_addr'   => $this->getUser()->email,
      'from_name' => 'ShopGab',
      'from_addr' => 'notification@shopgab.com',
      'subject'   => "ShopGab Notifications",
      'body'      => View::forge('emails/template', array(
          'content' => View::forge('emails/paypal_failed', array(

            )),
        ), false),
    ));
  } // notifyPaypalFailed

  /**
   * Notify professional user hia subscription is going to be renewed in 2 days
   */
  public function notifyPaypalRenew() {
    if (!$this->automatic_plan_notification_sent) {
      Service_Email::send(array(
        'type'      => 'client_notifications',
        'to_addr'   => $this->getUser()->email,
        'from_name' => 'ShopGab',
        'from_addr' => 'notification@shopgab.com',
        'subject'   => "ShopGab Notifications",
        'body'      => View::forge('emails/template', array(
            'content' => View::forge('emails/paypal_soon_renew', array(

              )),
          ), false),
      ));
      $this->set('automatic_plan_notification_sent', true);
      $this->save();
    } // if
  } // notifyPaypalFailed

  /**
   * Get price for this professional
   * @return float
   */
  public function getPrice() {
    if (is_null($this->price)) {
      return Model_Paypal::getDefaultPrice();
    } else {
      return round($this->price, 2);
    } // if
  } // getPrice

  /**
   * Return professional model
   * @param $user_id
   * @return Model_Professional
   */
  static public function getByUserId($user_id) {
    return self::query()->where('user_id', $user_id)->get_one();
  } // getByUserId

  /**
   * Logos
   */
  protected $logo_sizes = array('120' => '60');

  public function add_logo($file)
  {
    $connection = Service_Cloudfiles::get_connection();

    foreach ($this->logo_sizes as $width => $height)
    {
      $tmp_path        = $file['saved_to'] . $file['saved_as'];
      $file_name       = pathinfo($tmp_path, PATHINFO_FILENAME);
      $new_file_name   = "{$file_name}.png";
      $tmp_resize_path = APPPATH . "tmp/{$width}x{$height}_{$new_file_name}";

      Image::load($file['saved_to'] . $file['saved_as'])
        ->crop_resize($width, $height)
        ->save($tmp_resize_path);

      $container = $connection->get_container("logo_{$width}x{$height}");
      $image     = $container->create_object($new_file_name);
      $image->load_from_filename($tmp_resize_path);

      $logo = new Model_Professional_Logo();
      $logo->professional_id      = $this->id;
      $logo->name                 = $image->name;
      $logo->public_uri           = $image->public_uri();
      $logo->public_ssl_uri       = $image->public_ssl_uri();
      $logo->public_streaming_uri = $image->public_streaming_uri();
      $logo->width                = $width;
      $logo->height               = $height;
      $logo->content_length       = $image->content_length;
      $logo->save();

      File::delete($tmp_resize_path);
    }

    File::delete($tmp_path);
  }

  /**
   * undefined_method
   */
  public function has_logos()
  {
    return Model_Professional_Logo::query()->where('professional_id', $this->id)->count() > 0;
  }

  /**
   * undefined_method
   */
  public function delete_logos()
  {
    $connection = Service_Cloudfiles::get_connection();

    foreach ($this->get_logos() as $logo)
    {
      $container = $connection->get_container($logo->container_name());
      $container->delete_object($logo->name);
      $logo->delete();
    }
  }

  /**
   * @return Model_Professional_Logo[]
   */
  public function get_logos()
  {
    return Model_Professional_Logo::query()->where('professional_id', $this->id)->get();
  }


  public function get_logo_uri($width = 120, $height = 60) {
    if ($logo = $this->get_logo($width, $height)) {
      return $logo->public_uri;
    }

    return $this->default_logo_uri($width, $height);
  }

  /**
   * undefined_method
   */
  public function get_logo($width = 120, $height = 60) {
    return Model_Professional_Logo::query()
      ->where('professional_id', $this->id)
      ->where('width', $width)
      ->where('height', $height)
      ->get_one();
  }

  /**
   * undefined_method
   */
  public function default_logo_uri() {
    return Uri::create("assets/img/avatar/logo.png");
  }

} // Model_Professional