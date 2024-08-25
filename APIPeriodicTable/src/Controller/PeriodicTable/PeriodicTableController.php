<?php

namespace App\Controller\PeriodicTable;

use App\Interface\ElementHelperInterface;
use App\Repository\AtomCategoryRepository;
use App\Repository\AtomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PeriodicTableController extends AbstractController
{

    public function __construct(private array $ListeAtomes=[], private array $Atomes=[], private array $listefamily=[], private int $Lanthanides=1,  private int $Actinides=1)
    {
    }

    #[Route('/tableau/{param}/{value}', name: 'app_tableau', requirements: ['param' => '\w+', 'value' => '\d+'], defaults: ['param' => null, 'value' => null])]
    public function index(Request $request, AtomeRepository $atomeRepository, ElementHelperInterface $elementHelper, AtomCategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        $param = $request->attributes->get('param');
        $value = $request->attributes->get('value');

        if ($param === null && $value === null){
            $this->ListeAtomes = $atomeRepository->findAll();
            foreach ($this->ListeAtomes as $value){
                $this->listefamily[] = $elementHelper->LanthanidesActinides($value->getId());
                $this->Atomes[$value->getId()] = $value;
            }
        }
        if ($param !== null && $value !== null){
            $this->ListeAtomes = $atomeRepository->findBy([$param=>$value]);
            foreach ($this->ListeAtomes as $value){
                $this->listefamily[] = $elementHelper->LanthanidesActinides($value->getId());
                $this->Atomes[$value->getId()] = $value;
            }
        }
        $this->Lanthanides = array_search('Lanthanides', $this->listefamily);
        $this->Actinides = array_search('Actinides', $this->listefamily);
        return $this->render('table/index.html.twig', [
            'Atomes' => $this->Atomes, 'Lanthanides'=>$this->Lanthanides, 'Actinides'=>$this->Actinides, 'category'=>$category
        ]);
    }
}
