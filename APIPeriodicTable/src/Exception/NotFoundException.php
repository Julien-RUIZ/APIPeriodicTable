<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Code HTTP: 404 Not Found
 * Description: Utilisée pour indiquer que la ressource demandée n'a pas été trouvée sur le serveur.
 * Exemple d'utilisation: Quand une URL ne correspond à aucun des itinéraires définis dans ton application.
 */
class NotFoundException extends NotFoundHttpException
{
    public function __construct($message = 'Object not found')
    {
        parent::__construct($message);
    }
}