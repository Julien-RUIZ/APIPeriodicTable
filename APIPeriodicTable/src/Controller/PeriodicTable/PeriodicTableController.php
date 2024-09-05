<?php

namespace App\Controller\PeriodicTable;

use App\Interface\ElementHelperInterface;
use App\Repository\ElementCategoryRepository;
use App\Repository\ElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PeriodicTableController extends AbstractController
{

    public function __construct(private array $ListeElements=[], private array $Elements=[], private array $listefamily=[], private int $Lanthanides=1,  private int $Actinides=1)
    {
    }

    #[Route('/tableau/{param}={value}', name: 'app_tableau', requirements: ['param' => '\w+', 'value' => '\d+'], defaults: ['param' => null, 'value' => null])]
    public function index(Request $request, ElementRepository $atomeRepository, ElementHelperInterface $elementHelper, ElementCategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        $param = $request->attributes->get('param');
        $value = $request->attributes->get('value');

        if ($param === null && $value === null){
            $this->ListeElements = $atomeRepository->findAll();
            foreach ($this->ListeElements as $value){
                $this->listefamily[] = $elementHelper->LanthanidesActinides($value->getId());
                $this->Elements[$value->getId()] = $value;
            }
        }
        if ($param !== null && $value !== null){
            $this->ListeElements = $atomeRepository->findBy([$param=>$value]);
            foreach ($this->ListeElements as $value){
                $this->listefamily[] = $elementHelper->LanthanidesActinides($value->getId());
                $this->Elements[$value->getId()] = $value;
            }
        }
        $this->Lanthanides = array_search('Lanthanides', $this->listefamily);
        $this->Actinides = array_search('Actinides', $this->listefamily);
        return $this->render('table/index.html.twig', [
            'Elements' => $this->Elements, 'Lanthanides'=>$this->Lanthanides, 'Actinides'=>$this->Actinides, 'category'=>$category
        ]);
    }
}
