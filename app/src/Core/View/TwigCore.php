<?php

namespace Apps\Core\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigCore
{
    private static $twig;

    /**
     * @return Environment
     */
    public static function getEnvironment(): Environment
    {
        if (!self::$twig) {

            // Gestion du moteur de template
            $loader = new FilesystemLoader(__DIR__ . '/../../../templates/');
            // création de l'objet $twig

            self::$twig = new Environment($loader, [
                // TODO mettre en param
                //'cache' => __DIR__ . '/../var/cache',
            ]);
        }
        return self::$twig;
    }
}