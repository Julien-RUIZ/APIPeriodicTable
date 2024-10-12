<?php

namespace App\Controller\PeriodicTable;

use App\Interface\ElementHelperInterface;
use App\Repository\ElementCategoryRepository;
use App\Repository\ElementDefinitionsRepository;
use App\Repository\ElementGroupeRepository;
use App\Repository\ElementPeriodRepository;
use App\Repository\ElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PeriodicTableController extends AbstractController
{

    public function __construct(private readonly ElementPeriodRepository $periodRepository,
                                private readonly ElementGroupeRepository $groupeRepository ,
                                private readonly ElementDefinitionsRepository $definitionsRepository,
                                private readonly ElementCategoryRepository $categoryRepository,
                                private array $ListeElements=[],
                                private array $Elements=[],
                                private array $listefamily=[],
                                private array $def=[],
                                private int $Lanthanides=1,
                                private int $Actinides=1)
    {
    }

    #[Route('/tableau/{param}={value}', name: 'app_tableau', requirements: ['param' => '\w+'], defaults: ['param' => null, 'value' => null])]
    public function index( Request $request,
                           ElementRepository $elementRepository,
                           ElementHelperInterface $elementHelper,
                           ElementCategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        $param = $request->attributes->get('param');
        $value = $request->attributes->get('value');

        if ($param === null && $value === null){
            $this->ListeElements = $elementRepository->findAll();
            foreach ($this->ListeElements as $value){
                $this->listefamily[] = $elementHelper->LanthanidesActinides($value->getId());
                $this->Elements[$value->getId()] = $value;
            }
        }
        if ($param !== null && $value !== null){
            $this->def= $this->definitionParam($param, $value);
            $this->ListeElements = $elementRepository->findBy([$param=>$value]);
            foreach ($this->ListeElements as $value){
                $this->listefamily[] = $elementHelper->LanthanidesActinides($value->getId());
                $this->Elements[$value->getId()] = $value;
            }
        }
        $this->Lanthanides = array_search('Lanthanides', $this->listefamily);
        $this->Actinides = array_search('Actinides', $this->listefamily);
        return $this->render('table/index.html.twig', [
            'Elements' => $this->Elements, 'Lanthanides'=>$this->Lanthanides, 'Actinides'=>$this->Actinides, 'category'=>$category, 'def'=>$this->def
        ]);
    }

    /**
     * @param $param
     * @param $value
     * @return array
     * Creation of a definition method for retrieving information based on parameters
     */
    private function definitionParam($param, $value){
        if ($param == 'groupeVertical'){
            if ($value >= 3 and $value<=12 ){
                $this->def = ['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'groupe'=>$this->groupeRepository->findOneBy(['groupN'=>'Groupe3_12'])];
            }else{
                $this->def = ['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'groupe'=>$this->groupeRepository->findOneBy(['groupN'=>'Groupe'.$value])];
            }
        }elseif ($param == 'ChemicalState'){
            $this->def=['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'chemicalState'=> $value];
        }elseif ($param == 'periodeHorizontal'){
            $this->def=['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'periode'=> $this->periodRepository->findOneBy(['id'=>$value])];
        }elseif ($param == 'elementCategory'){
            $this->def=['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'category'=> $this->categoryRepository->findOneBy(['id'=>$value])];
        }elseif ($param == 'radioactif'){
            if ($value == 1 ){
                $this->def = ['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'radioactif'=> 'Oui'];
            }else{
                $this->def = ['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param]),'radioactif'=> 'Non'];
            }
        } else{
            $this->def=['definition'=>$this->definitionsRepository->findOneBy(['namePropertyElement'=>$param])];
        }
        return $this->def;
    }

}
