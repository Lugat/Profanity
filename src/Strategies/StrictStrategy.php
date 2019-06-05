<?php

  /**
   * Strict Strategy
   * 
   * @copyright Copyright (c) 2019 SquareFlower Websolutions
   * @license BSD License
   * @author Lukas Rydygel <hallo@squareflower.de>
   * @version 0.1.1
   */

  namespace Profanity\Strategies;
  
  use Profanity\AbstractStrategy;
  use Profanity\StrategyInterface;
  
  class StrictStrategy extends AbstractStrategy implements StrategyInterface
  {
    
    public function execute(string $string, array $badwords = []) : bool
    {
      
      if (preg_match('/'.implode('|', $badwords).'/i', $string)) {
        return true;
      }
            
      return false;
      
    }
    
  }

