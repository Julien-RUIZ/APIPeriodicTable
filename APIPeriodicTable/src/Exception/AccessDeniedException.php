<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Code HTTP: 403 Forbidden
 * Description: Utilisée pour signaler que l'accès à la ressource est interdit. Cela se produit généralement lorsque l'utilisateur n'a pas les autorisations nécessaires pour accéder à la ressource.
 * Exemple d'utilisation: Lorsque l'utilisateur essaie d'accéder à une page protégée sans les permissions appropriées.
 */
class AccessDeniedException extends AccessDeniedHttpException
{
    public function __construct($message = 'Access denied')
    {
        parent::__construct($message);
    }
}