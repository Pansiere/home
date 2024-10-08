<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2faa3544625b6cf81d64ede2bb84b55
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pansiere\\Alura\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pansiere\\Alura\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2faa3544625b6cf81d64ede2bb84b55::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2faa3544625b6cf81d64ede2bb84b55::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf2faa3544625b6cf81d64ede2bb84b55::$classMap;

        }, null, ClassLoader::class);
    }
}
