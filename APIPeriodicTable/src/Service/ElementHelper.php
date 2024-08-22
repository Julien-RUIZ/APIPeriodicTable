<?php

namespace App\Service;

use App\Interface\ElementHelperInterface;
use Doctrine\ORM\EntityManagerInterface;

class ElementHelper implements ElementHelperInterface
{
    public function LanthanidesActinides($id): string
    {
        $result = '';
        if ($id >= 57 && $id <=71){
            $result= 'Lanthanides';
        }
        if ($id >= 89 && $id <=103){
            $result= 'Actinides';
        }
        return $result;
    }
}