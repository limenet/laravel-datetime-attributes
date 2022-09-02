<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    '@Symfony' => true,
    '@Symfony:risky' => true,
    '@PHP80Migration' => true,
    '@PHP80Migration:risky' => true,
    '@PER' => true,
    '@PER:risky' => true,
];

$project_path = getcwd();
$finder = Finder::create()
    ->in([
        $project_path . '/src',
        $project_path . '/tests',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true);
