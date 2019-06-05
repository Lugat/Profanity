<?php

  namespace Profanity\Strategies;
  
  use Profanity\AbstractStrategy;
  use Profanity\StrategyInterface;
  
  class SimilarStrategy extends AbstractStrategy implements StrategyInterface
  {
    
    public $index = 80;
    
    public function execute(string $string, array $badwords = []) : bool
    {
            
      $words = $words = str_word_count($string, 1);
      
      foreach ($words as $word) {
        
        foreach ($badwords as $badword) {
          
          similar_text($word, $badword, $this->percent);
          
          if ($this->percent >= $this->index) {
            return true;
          }
          
        }
        
      }
      
      return false;
      
    }
    
  }

