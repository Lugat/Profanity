<?php

  namespace Profanity\Strategies;
  
  use Profanity\AbstractStrategy;
  use Profanity\StrategyInterface;
  
  class SmartStrategy extends AbstractStrategy implements StrategyInterface
  {
    
    public $index = 3;
    
    public function execute(string $string, array $badwords = []) : bool
    {
      
      $words = $words = str_word_count($string, 1);
      
      foreach ($words as $word) {
        
        foreach ($badwords as $badword) {
          
          $lev = levenshtein($word, $badword);
          
          if ($lev <= $this->index) {
            return true;
          }
          
        }
        
      }
      
      return false;
      
    }
    
  }