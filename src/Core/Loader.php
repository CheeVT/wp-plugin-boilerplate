<?php

namespace CheeVT\Core;

use HaydenPierce\ClassFinder\ClassFinder;

class Loader
{
    public static function init(array $namespaces)
    {
        if(!is_array($namespaces)) return;

        foreach($namespaces as $namespace) {
            $classes = ClassFinder::getClassesInNamespace($namespace);

            array_map(function($class){
                new $class;
            }, $classes);
        }
    }
}