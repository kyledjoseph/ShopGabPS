<?php

class Controller_Quests extends Controller_App
{
	public function before()
	{
		parent::before();

		$this->require_auth();
	}


	/**
	 * 
	 */
	private function get_quest_by_url($quest_url)
	{
		$quest = $this->user->get_quest($quest_url);
		//$quest = Model_Quest::get_by_url($quest_url);

		if (! isset($quest))
		{
			$this->redirect('/');
		}

		return $quest;
	}

	
	/**
	 * Show all quests of the current user
	 */
	// public function get_index()
	// {
	// 	$this->template->body = View::forge('quests/view', array(
	// 		'quests' => $this->user->get_quests(), //!
	// 	));
	// }


	/**
	 * View quest
	 */
	public function get_view($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);

		// Casset::js('lib/jquery.tipTip.minified.js');
		// Casset::js('lib/jquery.expander.min.js');
		Casset::js('site/quest.js');
		// Casset::css('lib/tipTip.css');

		$this->add_modal(View::forge('quests/modal/invite', array('quest' => $quest)));
		$this->add_modal(View::forge('quests/modal/add_product'));

		$this->template->body = View::forge('quests/view', array(
			'quest'           => $quest,
			'quest_messages'  => $quest->get_messages(),
			'product_i'       => 1,
		));
	}


	/**
	 * Create a new quest
	 */
	public function get_create()
	{
		$this->template->body = View::forge('quests/create', array(
			
		));
	}

	public function post_create()
	{
		$post  = $this->post_data('name', 'description', 'purchase_within');
		$quest = $this->user->create_quest($post->name, $post->description, $post->purchase_within);
		$this->redirect($quest->url());
	}


	/**
	 * Edit quest
	 */
	public function get_edit($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);

		if ($quest->user_id !== $this->user->id)
		{
			$this->redirect_invalid_quest();
		}

		$this->template->body = View::forge('quests/edit', array(
			'quest' => $quest,
		));
	}

	public function post_edit($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);

		if ($quest->user_id !== $this->user->id)
		{
			$this->redirect_invalid_quest();
		}

		$post = $this->post_data('name', 'description');

		$quest->name        = $post->name;
		$quest->description = $post->description;
		$quest->save();

		$this->redirect($quest->url());
	}


	/**
	 * Delete a quest
	 */
	public function get_delete($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);

		if ($quest->user_id !== $this->user->id)
		{
			$this->redirect('/');
		}

		$quest->delete();
		$this->redirect('/');
	}


	/**
	 *
	 */
	public function post_invite($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);

		// if ($quest->user_id !== $this->user->id)
		// {
		// 	$this->redirect($quest->url());
		// }

		$post = $this->post_data('to', 'subject', 'description');

		$body = $post->description;
		$body.= '<br><br>';
		$body.= '<a href="http://itemnation.com/'.$quest->url().'">http://itemnation.com/'.$quest->url().'</a>';


		Service_Email::send(array(
			'type'      => 'quest_invite',
			'to_addr'   => $post->to,
			'from_name' => 'ItemNation',
			'from_addr' => 'info@itemnation.com',
			'subject'   => $post->subject,
			'body'      => $body,
		));

		$this->redirect($quest->url(), 'info', "Invitation to '{$post->to}' has been sent");
	}


	/**
	 * update purhase within time
	 */
	public function post_within($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);

		if ($quest->user_id !== $this->user->id)
		{
			$this->redirect($quest->url());
		}

		$post = $this->post_data('purchase_within');

		$quest->purchase_within = $post->purchase_within;
		$quest->save();

		$this->redirect($quest->url());
	}


	/**
	 * add a message to the quest discussion
	 */
	public function post_message($quest_url)
	{
		$quest = $this->get_quest_by_url($quest_url);
		$post  = $this->post_data('message');

		$quest->new_message($this->user->id, $post->message);
		$this->redirect($quest->url());
	}


	/**
	 * 
	 */
	public function get_remove($quest_url, $quest_product_id)
	{
		$quest = $this->get_quest_by_url($quest_url);
		$quest_product = $quest->get_quest_product($quest_product_id);

		if (! $quest-belongs_to_user($this->user->id))
		{
			$this->redirect($quest->url());
		}

		if (! isset($quest_product))
		{
			$this->redirect_invalid_quest();
		}

		$quest_product->remove();
		$this->redirect($quest->url(), 'success', 'Product recomendation deleted');
	}


	/**
	 * add a product comment to a quest
	 */
	public function post_comment($quest_url, $quest_product_id)
	{
		$quest = $this->get_quest_by_url($quest_url);
		$post  = $this->post_data('comment');

		$quest_product = $quest->get_quest_product($quest_product_id);

		if (! isset($quest_product))
		{
			$this->redirect_invalid_quest();
		}

		$quest_product->add_comment($quest_product->id, $this->user->id, $post->comment);
		
		$this->redirect($quest->url());
	}


	/**
	 * Like a quest product
	 */
	public function get_like($quest_url, $quest_product_id)
	{
		$quest = $this->get_quest_by_url($quest_url);

		$quest_product = $quest->get_quest_product($quest_product_id);
		isset($quest_product) or $this->redirect($quest->url(), 'info', 'Invalid product');

		// has the user already voted?
		if ($quest_product->has_user_voted($this->user->id))
		{
			$vote = $quest_product->user_get_vote($this->user->id);

			// change vote
			if ($vote->is_dislike())
			{
				$vote->change_to_like();
			}

			$this->redirect($quest->url());
		}
		
		// like the quest product
		$quest_product->like($this->user->id);
		$this->redirect($quest->url());
	}


	/**
	 * Like a quest product
	 */
	public function get_dislike($quest_url, $quest_product_id)
	{
		$quest = $this->get_quest_by_url($quest_url);

		$quest_product = $quest->get_quest_product($quest_product_id);
		isset($quest_product) or $this->redirect($quest->url(), 'info', 'Invalid product');

		// has the user already voted?
		if ($quest_product->has_user_voted($this->user->id))
		{
			$vote = $quest_product->user_get_vote($this->user->id);

			// change vote
			if ($vote->is_like())
			{
				$vote->change_to_dislike();
			}

			$this->redirect($quest->url());
		}
		
		// dislike the quest product
		$quest_product->dislike($this->user->id);
		$this->redirect($quest->url());
	}

}