<?php

  /**
   * Configurable
   * 
   * @copyright Copyright (c) 2019 SquareFlower Websolutions
   * @license BSD License
   * @author Lukas Rydygel <hallo@squareflower.de>
   * @version 0.1
   */

  namespace Profanity;
  
  class Configurable
  {
        
    public function init(array $config = [])
    {
      
      $reflection = new \ReflectionObject($this);
      
      $publicProperties = [];
      foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
        $publicProperties[] = $property->getName();
      }
      
      $properties = array_intersect($publicProperties, array_keys($config));
      
      foreach ($properties as $property) {
        $this->$property = $config[$property];
      }
                  
    }
        
  }