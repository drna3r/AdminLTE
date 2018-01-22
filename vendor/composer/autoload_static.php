<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae40549ee217bf34a9c96d4d6ce35299
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'jDateTime' => __DIR__ . '/..' . '/sallar/jdatetime/jdatetime.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae40549ee217bf34a9c96d4d6ce35299::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae40549ee217bf34a9c96d4d6ce35299::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae40549ee217bf34a9c96d4d6ce35299::$classMap;

        }, null, ClassLoader::class);
    }
}
