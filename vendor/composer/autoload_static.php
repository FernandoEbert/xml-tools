<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit162c2f80763fcdd94d678f5882e95906
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fernandoebert\\XmlTools\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fernandoebert\\XmlTools\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit162c2f80763fcdd94d678f5882e95906::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit162c2f80763fcdd94d678f5882e95906::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit162c2f80763fcdd94d678f5882e95906::$classMap;

        }, null, ClassLoader::class);
    }
}