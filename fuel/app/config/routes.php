<?php
return array(
	'_root_'                   => 'home/index',
	'_404_'                    => 'error/404',

	'bookmark'                 => 'bookmark/view',

	'login'                    => 'user/login',
	'logout'                   => 'user/logout',
	'register'                 => 'user/register',
	'forgot'                   => 'user/forgot',
	'reset/(:segment)'         => 'user/reset/$1',
	'account'                  => 'user/account',

	'quest/create'             => 'chats/create',
	'quest/delete/(:any)'      => 'chats/delete/$1',
	'quest/like/(:any)'        => 'chats/like/$1',
	'quest/dislike/(:any)'     => 'chats/dislike/$1',
	'quest/message/(:any)'     => 'chats/message/$1',
	'quest/within/(:any)'      => 'chats/within/$1',
	'quest/invite/(:any)'      => 'chats/invite/$1',
	'quest/(:segment)'         => 'chats/view/$1',
	'quest/(:segment)/edit'    => 'chats/edit/$1',
	'quest/(:segment)/comment' => 'chats/comment/$1',
	'quest'                    => 'chats/index',
);