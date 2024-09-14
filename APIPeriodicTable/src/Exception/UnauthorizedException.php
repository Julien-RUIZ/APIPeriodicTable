<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * Code HTTP: 401 Unauthorized
 * Description: Utilisée pour signaler que l'utilisateur n'est pas authentifié ou que l'authentification fournie est invalide. Cette erreur est généralement retournée lorsque l'utilisateur doit se connecter ou fournir des informations d'authentification.
 * Exemple d'utilisation: Lorsque l'accès à une API nécessite une authentification, mais que l'utilisateur n'a pas fourni de jeton ou d'identifiants valides.
 */
class UnauthorizedException extends UnauthorizedHttpException
{
    public function __construct($message = 'Authentication required')
    {
        parent::__construct('Bearer', $message); // 'Bearer' is a placeholder for the scheme, adjust as needed
    }
}