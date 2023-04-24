<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reclamation;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;

class ReclamationFrontController extends AbstractController
{
    #[Route('/reclamation/front', name: 'app_reclamation_front')]
    public function index(Request $request): Response
    {
        $reclamation = new Reclamation();

        $form = $this->createForm(ReclamationType::class, $reclamation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reclamation);
            $entityManager->flush();

            $this->addFlash('success', 'Your reclamation has been submitted successfully.');

            return $this->redirectToRoute('app_reclamation_front');
        }

        return $this->render('reclamation_front/rec.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
