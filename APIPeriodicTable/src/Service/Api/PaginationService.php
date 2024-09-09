<?php

namespace App\Service\Api;

class PaginationService
{
    public function InfoPagination($page, $limit, $nbtotal):array
    {
        $page = intval($page);
        $limit = intval($limit);
        $nbtotal = intval($nbtotal);
        $pageMax = $limit != null ? intval(ceil($nbtotal/$limit)) : null;
        $Info = $page!=null && $limit!=null ? ['Numéro de la page'=>$page, 'Element par page'=>$limit, 'Page total'=>$pageMax, "Nombre d'élément max"=> $nbtotal] : ['Page total'=>1,"Nombre d'élément max"=> $nbtotal];
        return $Info;
    }
    public function Pagination($page, $limit, $nbtotal, $donnees){
        $Infopage =$this->InfoPagination($page, $limit, $nbtotal);
        $affichage = ['data'=> $donnees, 'pagination'=>$Infopage];
        return $affichage;
    }
}