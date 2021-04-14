<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit714bd2d3e3580ac66e249ecd1f3b4bf2
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NovaPoshta\\' => 11,
        ),
        'A' => 
        array (
            'Auryn\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NovaPoshta\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Auryn\\' => 
        array (
            0 => __DIR__ . '/..' . '/rdlowrey/auryn/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit714bd2d3e3580ac66e249ecd1f3b4bf2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit714bd2d3e3580ac66e249ecd1f3b4bf2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit714bd2d3e3580ac66e249ecd1f3b4bf2::$classMap;

        }, null, ClassLoader::class);
    }
}