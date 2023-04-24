<?php

namespace App\Controller;

use App\Entity\Pointderelais;
use App\Form\PointderelaisType;
use App\Repository\PointderelaisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pointderelais/front')]
class PointderelaisFrontController extends AbstractController
{
    #[Route('/', name: 'app_pointderelais_front_index', methods: ['GET'])]
    public function index(PointderelaisRepository $pointderelaisRepository): Response
    {
        return $this->render('pointderelais_front/index.html.twig', [
            'pointderelais' => $pointderelaisRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pointderelais_front_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PointderelaisRepository $pointderelaisRepository): Response
    {
        $pointderelai = new Pointderelais();
        $form = $this->createForm(PointderelaisType::class, $pointderelai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pointderelaisRepository->save($pointderelai, true);

            return $this->redirectToRoute('app_pointderelais_front_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pointderelais_front/new.html.twig', [
            'pointderelai' => $pointderelai,
            'form' => $form,
        ]);
    }

    #[Route('/{idPointderelais}', name: 'app_pointderelais_front_show', methods: ['GET'])]
    public function show(Pointderelais $pointderelai): Response
    {
        return $this->render('pointderelais_front/show.html.twig', [
            'pointderelai' => $pointderelai,
        ]);
    }

    #[Route('/{idPointderelais}/edit', name: 'app_pointderelais_front_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pointderelais $pointderelai, PointderelaisRepository $pointderelaisRepository): Response
    {
        $form = $this->createForm(PointderelaisType::class, $pointderelai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pointderelaisRepository->save($pointderelai, true);

            return $this->redirectToRoute('app_pointderelais_front_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pointderelais_front/edit.html.twig', [
            'pointderelai' => $pointderelai,
            'form' => $form,
        ]);
    }

    #[Route('/{idPointderelais}', name: 'app_pointderelais_front_delete', methods: ['POST'])]
    public function delete(Request $request, Pointderelais $pointderelai, PointderelaisRepository $pointderelaisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pointderelai->getIdPointderelais(), $request->request->get('_token'))) {
            $pointderelaisRepository->remove($pointderelai, true);
        }

        return $this->redirectToRoute('app_pointderelais_front_index', [], Response::HTTP_SEE_OTHER);
    }
}
