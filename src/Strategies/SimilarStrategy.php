<?php

  /**
   * Similar Strategy
   * 
   * @copyright Copyright (c) 2019 SquareFlower Websolutions
   * @license BSD License
   * @author Lukas Rydygel <hallo@squareflower.de>
   * @version 0.1
   */

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
          
          similar_text($word, $badword, $percent);
          
          if ($percent >= $this->index) {
            return true;
          }
          
        }
        
      }
      
      return false;
      
    }
    
  }

