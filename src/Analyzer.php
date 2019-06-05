<?php

  /**
   * Profanity Analyzer
   * 
   * @copyright Copyright (c) 2019 SquareFlower Websolutions
   * @license BSD License
   * @author Lukas Rydygel <hallo@squareflower.de>
   * @version 0.1
   */

  namespace Profanity;
  
  class Analyzer extends Configurable
  {
    
    protected $strategies = [];
    
    public $aliases = [];
    public $badwords = [];
    
    public function __construct(array $config = [])
    {
      $this->init($config);
    }
    
    public function addStrategy($strategy, array $config = [])
    {
      
      $this->strategies[] = AbstractStrategy::getInstance($strategy, $config);
      
      return $this;
      
    }
    
    public function execute(string $string)
    {
      
      $string = $this->prepare($string);
            
      foreach ($this->strategies as $strategy) {
        
        if ($strategy->execute($string, $this->badwords)) {
          return true;
        }
        
      }
      
      return false;
      
    }
    
    protected function prepare($string)
    {
            
      $search = array_keys($this->aliases);
      $replace = array_values($this->aliases);
      
      return str_replace($search, $replace, strtolower($string));
            
    }
    
  }