<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\UserType;

use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
  
    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [
            
        ]);
    }



    #[Route('/top', name: 'listado', methods: ['GET'])]
    public function top(EntityManagerInterface $em): Response
    {   
        $datos = $em->createQuery('SELECT u.puntos, u.ultimo, u.username  FROM App\Entity\User u ORDER BY u.puntos  DESC ');
        $lista = $datos->getResult();
        return $this->render('main/top.html.twig', [
            'top' => $lista
        ]);

     
    }



    #[Route('/nuevo', name: 'app_user_uevo', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user);
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
            // return new RedirectResponse($this->urlGenerator->generate("listado"));
        }

        return $this->renderForm('main/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }


    
}
