<?php

  spl_autoload_register(function($class) {
    
    $prefix = 'Profanity\\';
    
    $length = strlen($prefix);

    if (strncmp($prefix, $class, $length) === 0) {

      $file = __DIR__.'\\'.str_replace('\\', '/', substr($class, $length)).'.php';

      if (file_exists($file)) {
        require_once($file);
      }

    }
    
  });