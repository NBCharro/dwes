<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit25a9380d6d12ee12f5a3c16cb2f63934
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit25a9380d6d12ee12f5a3c16cb2f63934', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit25a9380d6d12ee12f5a3c16cb2f63934', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit25a9380d6d12ee12f5a3c16cb2f63934::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
