<?php

return [

    //Create rules for site/index ?category & ?subject
    'doc/<category:\w+>/<subject:\w+>' => 'site/list',
    'doc/<category:\w+>' => 'site/index',
    'download/<file:\w+>' => 'site/download',
    'file/<slug:\w+>' => 'site/view',
    '' => 'site/index',
];