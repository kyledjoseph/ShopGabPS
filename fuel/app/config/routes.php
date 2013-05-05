<?php
return array(
	'_root_'  => 'home/index',
	'_404_'   => 'error/404',

	'quest/create'             => 'chats/create',
	'quest/like/(:any)'        => 'chats/like/$1',
	'quest/dislike/(:any)'     => 'chats/dislike/$1',
	'quest/message/(:any)'     => 'chats/message/$1',
	'quest/(:segment)'         => 'chats/view/$1',
	'quest/(:segment)/edit'    => 'chats/edit/$1',
	'quest/(:segment)/comment' => 'chats/comment/$1',
	'quest'                    => 'chats/index',
);