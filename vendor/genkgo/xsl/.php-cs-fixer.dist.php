<?php
return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
        'yoda_style' => false,
        'native_function_invocation' => ['include' => ['@all']],
        'phpdoc_no_package' => true,
        'no_empty_phpdoc' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'class_attributes_separation' => true,
    ])
    ->setRiskyAllowed(true);
