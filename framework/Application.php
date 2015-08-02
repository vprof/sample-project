<?php

namespace Framework;

use Framework\Router\Router;

class Application {
    
	private $config;
    
    function __construct ($config) {
	
		$this->config = require_once($config);
        
    }
    
    function run(){
		
        $router = new Router($this->config['routes']);
    }
}