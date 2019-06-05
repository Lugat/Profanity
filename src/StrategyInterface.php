<?php

  /**
   * Strategy Interface
   * 
   * @copyright Copyright (c) 2019 SquareFlower Websolutions
   * @license BSD License
   * @author Lukas Rydygel <hallo@squareflower.de>
   * @version 0.1
   */

  namespace Profanity;
  
  interface StrategyInterface
  {
    public function execute(string $string, array $badwords = []) : bool;   
  }