<?php

  namespace Profanity;
  
  interface StrategyInterface
  {
    
    public function execute(string $string) : bool;
    
  }