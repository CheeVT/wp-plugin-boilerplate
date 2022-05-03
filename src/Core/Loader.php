<?php

namespace CheeVT\Core;

use HaydenPierce\ClassFinder\ClassFinder;

class Loader
{
    public static function init(array $namespaces, $__dir__ = null)
    {
        if(!is_array($namespaces)) return;

        $loadedClasses = [];
        foreach($namespaces as $namespace) {
            $classes = ClassFinder::getClassesInNamespace($namespace);

            if(empty($classes)) {
                throw new \Exception($namespace . ' namespace cannot be initiated. There are no classes.');
            }
            
            array_push($loadedClasses, array_map(function($class) use($__dir__){
                return new $class($__dir__);
            }, $classes));
        }

        return $loadedClasses;
    }
}