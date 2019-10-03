<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4415140fea11c6dffee4aec3c5d2b64b
{
    public static $classMap = array (
        'Authnet' => __DIR__ . '/../..' . '/src/Model/Authnet.php',
        'AuthnetQuery' => __DIR__ . '/../..' . '/src/Model/AuthnetQuery.php',
        'Base\\Authnet' => __DIR__ . '/../..' . '/src/Model/Base/Authnet.php',
        'Base\\AuthnetQuery' => __DIR__ . '/../..' . '/src/Model/Base/AuthnetQuery.php',
        'Dpluso\\Payments\\Model\\MagicMethodTraits' => __DIR__ . '/../..' . '/src/MagicMethods.trait.php',
        'Dpluso\\Payments\\Model\\QueryTraits' => __DIR__ . '/../..' . '/src/Query.trait.php',
        'Dpluso\\Payments\\Model\\ThrowError' => __DIR__ . '/../..' . '/src/ThrowError.trait.php',
        'Dpluso\\Payments\\Model\\ThrowErrorTrait' => __DIR__ . '/../..' . '/src/ThrowError.trait.php',
        'Map\\AuthnetTableMap' => __DIR__ . '/../..' . '/src/Model/Map/AuthnetTableMap.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit4415140fea11c6dffee4aec3c5d2b64b::$classMap;

        }, null, ClassLoader::class);
    }
}
