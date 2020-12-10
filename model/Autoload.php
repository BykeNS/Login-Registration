<?php 

	spl_autoload_register(function($class) {

	   include_once 'model/' .$class .'.php ';


	});
?>