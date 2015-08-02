<?php

class Loader {

	//сюда б переменую запилить
    
    static function main_loader($className){
		
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		print_r ($fileName);
		echo '<br>';
        require $fileName;    
    }
		    
    static function addNamespacePath($name, $path){       
        set_include_path(get_include_path()	. PATH_SEPARATOR . $path . PATH_SEPARATOR . "..");
        spl_autoload_extensions(".php");
        spl_autoload_register(array('Loader', 'main_loader'));
    }
    
}
    
    