<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b2fa985f9e181d6ca3ed54842ed7758
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b2fa985f9e181d6ca3ed54842ed7758::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b2fa985f9e181d6ca3ed54842ed7758::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}