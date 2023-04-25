<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdb5e53036b143ddd0f34f361dc09c90f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdb5e53036b143ddd0f34f361dc09c90f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdb5e53036b143ddd0f34f361dc09c90f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdb5e53036b143ddd0f34f361dc09c90f::$classMap;

        }, null, ClassLoader::class);
    }
}
