<?php

spl_autoload_register(function($class_name) {

   
    $app = __DIR__.'\..\App';

    $dirs = array(
        '/Classes/', 
        '/Controllers/',     
        '/Models/',     
    );

   
    foreach( $dirs as $dir ) {

        $path = $app.$dir.$class_name.'.php';
        
        if (file_exists($path)) {
            
            require_once($path);
            return;
        }
        
    }


    
});

