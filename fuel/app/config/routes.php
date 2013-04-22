<?php
return array(
	'_root_'  => 'home/index',
	'_404_'   => 'error/404',


	'chats/(:segment)' => 'chats/view/$1',
	'chats' => 'chats/index',
);