<?php
return array(
	'_root_'  => 'home/index',
	'_404_'   => 'error/404',

	'chats/create'        => 'chats/create',
	'chats/like/(:any)'   => 'chats/like/$1',
	'chats/dislike/(:any)'=> 'chats/dislike/$1',
	'chats/message/(:any)'=> 'chats/message/$1',
	'chats/(:segment)'    => 'chats/view/$1',
	'chats'               => 'chats/index',
);