<?php
return array(
	'_root_'                   => 'home/index',
	'_404_'                    => 'error/404',

	'bookmark'                 => 'bookmark/view',

	'login'                    => 'user/login',
	'auth/(:any)'              => 'user/auth/$1',
	'logout'                   => 'user/logout',
	'register'                 => 'user/register',
	'forgot'                   => 'user/forgot',
	'reset/(:segment)'         => 'user/reset/$1',
	'account'                  => 'user/account',
	'account/password'         => 'user/password',

	'quest/create'             => 'quests/create',
	'quest/(:segment)/remove/(:segment)'  => 'quests/remove/$1/$2',
	'quest/(:segment)/like/(:segment)'    => 'quests/like/$1/$2',
	'quest/(:segment)/dislike/(:segment)' => 'quests/dislike/$1/$2',
	'quest/(:segment)/comment/(:segment)' => 'quests/comment/$1/$2',
	'quest/(:segment)/message' => 'quests/message/$1',
	'quest/(:segment)/within'  => 'quests/within/$1',
	'quest/(:segment)/invite'  => 'quests/invite/$1',
	'quest/(:segment)/edit'    => 'quests/edit/$1',
	'quest/(:segment)/delete'   => 'quests/delete/$1',
	'quest/(:segment)'         => 'quests/view/$1',
	'quest'                    => 'quests/index',
);