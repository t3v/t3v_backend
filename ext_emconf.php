<?php
/** @var string $_EXTKEY */

$EM_CONF[$_EXTKEY] = [
    'title' => 'T3v Backend',
    'description' => 'The backend extension of TYPO3voilà.',
    'author' => 'Maik Kempe',
    'author_email' => 'mkempe@bitaculous.com',
    'author_company' => 'Bitaculous - It\'s all about the bits, baby!',
    'category' => 'misc',
    'state' => 'alpha',
    'version' => '0.0.1',
    'createDirs' => '',
    'uploadfolder' => false,
    'clearCacheOnLoad' => false,
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.5.99',
            't3v_core' => '',
            't3v_translations' => ''
        ],
        'conflicts' => [
        ],
        'suggests' => []
    ],
    'autoload' => [
        'psr-4' => [
            'T3v\\T3vBackend\\' => 'Classes'
        ]
    ],
    'autoload-dev' => [
        'psr-4' => [
            'T3v\\T3vBackend\\Tests\\' => 'Tests'
        ]
    ]
];
