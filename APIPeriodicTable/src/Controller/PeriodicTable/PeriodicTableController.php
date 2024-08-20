<?php

namespace App\Controller\PeriodicTable;

use App\Repository\AtomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PeriodicTableController extends AbstractController
{
    private $result="";
    public function __construct(private array $atomes= [] )
    {
    }

    #[Route('/tableau/{param}/{value}', name: 'app_tableau', requirements: ['param' => '\w+', 'value' => '\d+'], defaults: ['param' => null, 'value' => null])]
    public function index(Request $request, AtomeRepository $atomeRepository): Response
    {
//dd($request);

        if ($request->attributes->get('param') === null && $request->attributes->get('value') === null)
        $this->atomes = $atomeRepository->findAll();
        foreach ($this->atomes as $value){
            $newatome[$value->getNom()] = $value;
        }
        if ($request->attributes->get('param') !== null && $request->attributes->get('value') !== null)
            $this->atomes = $atomeRepository->findBy([$request->attributes->get('param')=>$request->attributes->get('value')]);
        foreach ($this->atomes as $value){
            $var[] = $this->LanthanidesActinides($value->getId());
            $newatome[$value->getNom()] = $value;
        }
        $Lanthanides = array_search('Lanthanides', $var);
        $Actinides = array_search('Actinides', $var);

        return $this->render('tableau/index.html.twig', [
            'newatomes' => $newatome, 'Lanthanides'=>$Lanthanides, 'Actinides'=>$Actinides
        ]);
    }

    private function LanthanidesActinides($id){

        if ($id >= 57 && $id <=71){
            $this->result= 'Lanthanides';
        }
        if ($id >= 89 && $id <=103){
            $this->result= 'Actinides';
        }
        return $this->result;
    }
}
