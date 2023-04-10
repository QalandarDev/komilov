<?php

return [

    //Create rules for site/index ?category & ?subject
    'doc/<category:\w+>/<subject:\w+>' => 'site/index',
    'doc/<category:\w+>' => 'site/index',
    'doc/<subject:\w+>' => 'site/index',
    'download/<file:\w+>' => 'site/download',
    'file/<slug:\w+>' => 'site/view',
    '' => 'site/index',
];