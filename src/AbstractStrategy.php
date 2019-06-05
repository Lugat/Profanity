<?php

  /**
   * Abstract Strategy
   * 
   * @copyright Copyright (c) 2019 SquareFlower Websolutions
   * @license BSD License
   * @author Lukas Rydygel <hallo@squareflower.de>
   * @version 0.1
   */

  namespace Profanity;
  
  abstract class AbstractStrategy extends Configurable
  {
    
    public static function getInstance(string $strategy)
    {
              
      $strategyClass = '\Profanity\Strategies\\'.ucfirst($strategy).'Strategy';

      if (!class_exists($strategyClass)) {
        
        if (class_exists($strategy)) {
          $strategyClass = $strategy;
        } else {
          throw new \Exception("The strategy '$strategy' does not exist.");
        }
        
      }
      
      $strategyObject = new $strategyClass;
      
      if (!$strategyObject instanceof \Profanity\AbstractStrategy) {
        throw new \Exception("The class '$strategyClass' must extend 'Profanity\AbstractStrategy'.");
      }
      
      return $strategyObject;
      
    }
    
  }