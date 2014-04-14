<?php
return array(
	'_root_'                              => 'home/index',
	'_404_'                               => 'error/404',

	'bookmark'                            => 'bookmark/view',

	'login'                               => 'user/auth/login',
	'authenticate'                        => 'user/auth/authenticate',
	'logout'                              => 'user/auth/logout',
	'register'                            => 'user/register',
	'forgot'                              => 'user/forgot',
	'reset/(:segment)'                    => 'user/reset/$1',
  'confirm-resend'                      => 'user/confirm_resend',
  'confirm/(:segment)'                  => 'user/confirm/$1',

	'try'                                 => 'home/try',
	'account/(:any)'                      => 'user/$1',
	'account'                             => 'user/account',

  'client/(:segment)/edit'              => 'clients/edit/$1',
  'client/(:segment)/remove'            => 'clients/remove/$1',
  'client/(:segment)'                   => 'clients/view/$1',

	'quest/create'                        => 'quests/create',
	'quest/(:segment)/remove/(:segment)'  => 'quests/remove/$1/$2',
	'quest/(:segment)/like/(:segment)'    => 'quests/like/$1/$2',
	'quest/(:segment)/dislike/(:segment)' => 'quests/dislike/$1/$2',
	'quest/(:segment)/comment/(:segment)' => 'quests/comment/$1/$2',
	'quest/(:segment)/access/(:segment)'  => 'quests/access/$1/$2',
	'quest/(:segment)/message'            => 'quests/message/$1',
	'quest/(:segment)/within'             => 'quests/within/$1',
	'quest/(:segment)/invite/email'       => 'quests/invite_email/$1',
	'quest/(:segment)/invite/friends'     => 'quests/invite_friends/$1',
  'quest/(:segment)/add-product'        => 'quests/add_product/$1',
	'quest/(:segment)/edit'               => 'quests/edit/$1',
	'quest/(:segment)/delete'             => 'quests/delete/$1',
	'quest/(:segment)'                    => 'quests/view/$1',
	'quest'                               => 'quests/index',

	'privacy' => 'legal/privacy',
	'terms'   => 'legal/terms',

  'cron/(:any)'                         => 'cron/$1'
);