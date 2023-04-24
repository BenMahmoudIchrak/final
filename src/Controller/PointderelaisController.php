<?php

namespace App\Controller;
use App\Repository\PointderelaisRepository;
use App\Entity\Pointderelais;
use App\Form\PointderelaisType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PointderelaisController extends AbstractController
{#[Route('/pointderelais/back/', name: 'app_pointderelais_index', methods: ['GET'])]
    public function index(PointderelaisRepository $PointderelaisRepository): Response
    {
        return $this->render('pointderelais/index.html.twig', [
            'pointderelaiss' => $PointderelaisRepository->findAll(),
        ]);
    }
    
}