<?php

  namespace Profanity\Strategies;
  
  use Profanity\AbstractStrategy;
  use Profanity\StrategyInterface;
  
  class SoundStrategy extends AbstractStrategy implements StrategyInterface
  {
        
    public function execute(string $string, array $badwords = []) : bool
    {
      
      $words = $words = str_word_count($string, 1);

      foreach ($words as $word) {
        
        foreach ($badwords as $badword) {
          
          $word = metaphone($word);
          $badword = metaphone($badword);
          
          if ($word == $badword) {
            return true;
          }
          
        }
        
      }
      
      return false;
      
    }
    
  }