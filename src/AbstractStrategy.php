<?php

  namespace Profanity;
  
  abstract class AbstractStrategy extends Configurable
  {
    
    public static function getInstance(string $strategy)
    {
                     
      $strategyClass = strstr($strategy, '\\') ? $strategyClass : '\Profanity\Strategies\\'.ucfirst($strategy).'Strategy';
      if (class_exists($strategyClass)) {

        return new $strategyClass;

      } else {
        throw new \Exception("The strategy $strategy does not exist.");
      }
                
    }
    
  }