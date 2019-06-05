# Profanity
Strategy driven spam- and badword detection.

## Basic usage

1. Create a new analyzer with a given config:

```php
$analyzer = new Profanity\Analyzer($config);
```

The base config may contain the following parameters: 

aliases: array of letters or words which should be changed, eg. '0' => 'o'
badwords: array of words which should be detected, eg. 'asshole'

2. Add one or more strategies to the analyzer:

```php
$analyzer->addStrategy($strategy1, $config);
$analyzer->addStrategy($strategy2, $config);
```

The strategies will be executed in the order they have been added to the analyzer.

3. Execute the analyzer with a random string, eg. comments on your website etc.

```php
$badwordFound = $analyzer->execute($string);
```

If a badword has been found, the analyzer will stop the execution and return 'true'. If nothing is found, it will return 'false'.

## Strategies

Profanity has following build in strategies: 'simple', 'strict', 'smart', 'similar', 'sound'

### SimpleStrategy
Matches each badword against the string.

### StrictStrategy
Matches each badword against the string and ignores spaces or punctuation marks.

### SimilarStrategy
Compares each word of the string with each badword.
Accepts an 'index' (default = 80) which stands for the comparation rate in percent.

### SmartStrategy
Compares each word of the string with each badword by using the [Levenshtein distance](https://en.wikipedia.org/wiki/Levenshtein_distance).
Accepts an 'index' (default = 3) which stands for the distance.

### SoundStrategy
Comparres each word of the string with each given badword by using the [Metaphone key](https://en.wikipedia.org/wiki/Metaphone).
However, this strategy is only recommended for the english language.

## Custom Strategies

You may also write your own strategies and pass them into the analyzer, eg. 'MyCustomStrategy'
Custom strategies must extend the 'Profanity\AbstractStrategy' and implement the 'Profanity\StragegyInterface' in order wo work.
