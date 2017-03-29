<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1d12f305d615a60f18af3ff00e98a0e1
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kartik\\plugins\\fileinput\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kartik\\plugins\\fileinput\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/bootstrap-fileinput',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1d12f305d615a60f18af3ff00e98a0e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1d12f305d615a60f18af3ff00e98a0e1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}