<?php

namespace App\Service\Api;

class PaginationService
{
    public function Pagination($page, $limit, $nbtotal):array
    {
        $page = intval($page);
        $limit = intval($limit);
        $nbtotal = intval($nbtotal);
        $pageMax = $limit != null ? ceil($nbtotal/$limit) : null;
        $info = $page!=null && $limit!=null ? ['Numéro de la page'=>$page, 'Element par page'=>$limit, 'Page total'=>$pageMax, "Nombre d'élément max"=> $nbtotal] : ['Page total'=>1,"Nombre d'élément max"=> $nbtotal];
        return $info;
    }
}