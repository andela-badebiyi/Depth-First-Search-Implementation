# Depth-First-Search-Implementation
Implementation of depth first search algorithm in PHP. This was written mainly for education purposes.

## Usage
- clone repo
- include package in application
```php
  // the tree you want to traverse
  $tree = [
    1 => [8, 7],
    8 => [2, 3],
    3 => [6]
  ];

  // initialize dfs object
  $dfs = new Dfs($tree);

  // run dfs search
  $dfs->run()

  // get results
  $results = $dfs->getOutput

  // should print array of [1, 8, 2, 3, 6, 7]
  print_r($results);
```

## Tests
From the root directory run `phpunit`
