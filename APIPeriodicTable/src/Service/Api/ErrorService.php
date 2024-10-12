<?php

namespace App\Service\Api;

use App\Exception\BadRequestException;
use App\Exception\NotFoundException;

/**
 * Error management based on customer requests for the use of the API
 */
class ErrorService
{
    public function ApiError($donnees=null, $field=null, $page=null, $limit=null, $id=null){

        if (isset($donnees)){
            if (empty($donnees)){
                throw new NotFoundException('No data found');
            }
        }
        if ($id>118){
            throw new BadRequestException("Incorrect or incomplete request");
        }
        if (isset($field)){
            if ($field===""){
                throw new BadRequestException("Incorrect or incomplete request");
            }
        }
        if (isset($page) or isset($limit)){
            if ($page==="" or $limit===""){
                throw new BadRequestException("Incorrect or incomplete request");
            }
            if (isset($page) And isset($limit) And (intval($page)*intval($limit))>118 or (intval($page)*intval($limit))<=0){
                throw new BadRequestException("Number of elements exceeded depending on the page and limit variables");
            }
        }
    }
}