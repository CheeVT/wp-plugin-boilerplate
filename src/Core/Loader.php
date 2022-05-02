<?php

namespace CheeVT\Core;

use HaydenPierce\ClassFinder\ClassFinder;

class Loader
{
    public static function init(array $namespaces, $__dir__)
    {
        if(!is_array($namespaces)) return;

        foreach($namespaces as $namespace) {
            $classes = ClassFinder::getClassesInNamespace($namespace);

            if(empty($classes)) {
                throw new \Exception($namespace . ' namespace cannot be initiated. There are no classes.');
            }

            array_map(function($class) use($__dir__){
                new $class($__dir__);
            }, $classes);
        }
    }
}