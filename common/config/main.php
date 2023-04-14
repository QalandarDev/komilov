<?php

use yii\caching\FileCache;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
        'formatter'=>[
            'currencyCode'=>'UZS',
            'decimalSeparator'=>'.',
            'thousandSeparator'=>',',
            'numberFormatterOptions'=>[
                NumberFormatter::MIN_FRACTION_DIGITS => 0,
                NumberFormatter::MAX_FRACTION_DIGITS => 0,
            ],
        ]
    ],
];
