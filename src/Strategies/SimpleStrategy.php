<?php

  namespace Profanity\Strategies;
  
  use Profanity\AbstractStrategy;
  use Profanity\StrategyInterface;
  
  class SimpleStrategy extends AbstractStrategy implements StrategyInterface
  {
    
    public function execute(string $string, array $badwords = []) : bool
    {
      
      foreach ($badwords as $badword) {
        
        if (preg_match("/\b$badword\b/i", $string)) {
          return true;
        }
      
      }
      
      return false;
      
    }
    
  }

