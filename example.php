<?php

  include 'src/autoload.php';
  
  $analyzer = new Profanity\Analyzer([
    'badwords' => explode("\n", file_get_contents('badwords.txt')),
    'aliases' => [
      '0'   => 'o',
      '1'   => 'l',
      '2'   => 'r',
      '3'   => 'e',
      '4'   => 'a',
      '5'   => 's',
      '6'   => 'g',
      '7'   => 't',
      '8'   => 'b',
      '9'   => 'g',
      '@'   => 'a',
      '!'   => 'i',
      '$'   => 's',
      '§'   => 's',
      '('   => 'c',
      ')'   => 'd',
      '()'  => 'o',
      '><'  => 'x',
      '|'   => 'i',
      '+'   => 't',
      'vv'  => 'w'
    ]
  ]);
  
  $analyzer->addStrategy('simple');
  
  $string = 'Du bist ein Arsch!';
  
  if ($analyzer->execute($string)) {
    
    echo 'Badword detected.';
    
  } else {
    
    echo 'Text is safe.';
    
  }