<?php

return [

    //Create rules for site/index ?category & ?subject
    'doc/<category:\w+>/<subject:\w+>' => 'site/index',
    //Create rules for site/index ?category
    'doc/<category:\w+>' => 'site/index',
    //Create rules for site/index ?subject
    'doc/<subject:\w+>' => 'site/index',
    '' => 'site/index',
];