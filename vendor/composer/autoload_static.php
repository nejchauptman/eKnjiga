<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit66a0365cc91ab7f5d78c9adf74d96f0e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit66a0365cc91ab7f5d78c9adf74d96f0e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit66a0365cc91ab7f5d78c9adf74d96f0e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
