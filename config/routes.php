<?php
use ishop\Router;

Router::add('^product/(?P<alias>[a-z0-9-]+)/?$',['controller'=>'Product', 'action'=>'view']);
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$',['controller'=>'Category', 'action'=>'view']);

//default routes regular expression
Router::add('^admin$', ['controller'=>'Main', 'action'=>'index','prefix'=>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=>'admin']); //?P<controller> - при совпадении будет создан именованный элемент (controller) в массиве

Router::add('^$', ['controller'=>'Main', 'action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

// Router::add('^public/images$',['controller'=>'Main', 'action'=>'index','prefix'=>'admin']);
