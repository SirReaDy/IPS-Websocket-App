<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6a266ca3d5e706fe5502bb2f9b49dd3a
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WebSocket\\' => 10,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WebSocket\\' => 
        array (
            0 => __DIR__ . '/..' . '/textalk/websocket/lib',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6a266ca3d5e706fe5502bb2f9b49dd3a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6a266ca3d5e706fe5502bb2f9b49dd3a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6a266ca3d5e706fe5502bb2f9b49dd3a::$classMap;

        }, null, ClassLoader::class);
    }
}