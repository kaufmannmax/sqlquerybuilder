<?php
declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        './src',
        './tests/Unit',
    ]);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PER-CS2.0' => true,
    'strict_param' => true,
    'array_syntax' => ['syntax' => 'short'],
    'trailing_comma_in_multiline' => false,
])->setFinder($finder);
