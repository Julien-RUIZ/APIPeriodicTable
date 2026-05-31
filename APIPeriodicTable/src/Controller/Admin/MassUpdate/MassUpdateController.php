<?php

namespace App\Controller\Admin\MassUpdate;

use App\Form\MassUpdateType;
use App\Repository\ElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MassUpdateController extends AbstractController
{
    #[Route('/mass/update/{param}', name: 'app_mass_update', requirements: ['param' => '\w+'], defaults: ['param' => null])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request, ElementRepository $elementRepository): Response
    {
        $param = $request->attributes->get("param");
        $form = $this->createForm(MassUpdateType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $extrait = $request->request->all('mass_update')['values'];
            $value = json_decode($extrait, true);

            if (!is_array($value)) {
                $this->addFlash('error', 'Format JSON invalide. Exemple : {"1": "valeur", "2": "valeur"}');
                return $this->render('admin/UpdateMass/mass_update/index.html.twig', [
                    'param' => $param, 'form' => $form
                ]);
            }

            $elementRepository->UpdateAllElementsWithoutAParam($param, $value);
            $this->addFlash('success', "La modification des valeurs pour la colonne ".$param." est réalisée avec succès. ");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/UpdateMass/mass_update/index.html.twig', [
            'param' => $param, 'form'=>$form
        ]);
    }
}
