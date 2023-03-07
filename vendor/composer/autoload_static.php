<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc87551166df2266c359ac1913c3174b6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pakdhe\\Response\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pakdhe\\Response\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc87551166df2266c359ac1913c3174b6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc87551166df2266c359ac1913c3174b6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc87551166df2266c359ac1913c3174b6::$classMap;

        }, null, ClassLoader::class);
    }
}