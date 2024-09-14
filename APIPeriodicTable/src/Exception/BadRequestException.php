<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Code HTTP: 400 Bad Request
 * Description: Utilisée pour signaler que la requête envoyée par le client est mal formée ou contient des données invalides.
 * Exemple d'utilisation: Lorsque des paramètres de requête invalides ou mal formés sont fournis, comme dans le cas de paramètres de pagination incorrects.
 */
class BadRequestException extends BadRequestHttpException
{
    public function __construct($message = 'Invalid request')
    {
        parent::__construct($message);
    }
}