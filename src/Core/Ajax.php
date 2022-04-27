<?php

namespace CheeVT\Core;

use HaydenPierce\ClassFinder\ClassFinder;

abstract class Ajax
{
    const AJAX_NAMESPACE = 'CheeVT\Ajax';

    public static function init()
    {
        $ajaxClasses = ClassFinder::getClassesInNamespace(self::AJAX_NAMESPACE);

        array_map(function($class){
            new $class;
        }, $ajaxClasses);
    }
}