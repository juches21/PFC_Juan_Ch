<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;


class ClasicoController extends AbstractController
{
    #[Route('/clasico', name: 'app_clasico')]
    public function index(EntityManagerInterface $em,UserInterface $user): Response
    {   
        $id = $user->getId();
        // $separador = $em->createQuery('SELECT u.puntos, u.ultimo FROM App\Entity\User u WHERE u.id = ?1');
        // $separador->setParameter(1, $id);
        // $student = $separador->getResult();
        return $this->render('clasic/clasic.html.twig', [
            'controller_name' => 'ClasicoController',
            // 'nombre' => $student,
        ]);
    }

    #[Route('/ganada', name: 'ganada')]
    public function ganar(EntityManagerInterface $em,UserInterface $user): Response
    {
        $id = $user->getId();
     
        $suma = $em->createQuery("UPDATE App\Entity\User u SET u.puntos = u.puntos+3 WHERE u.id = ?1");
        $suma->setParameter(1, $id);

        $ultimo = $em->createQuery("UPDATE App\Entity\User u SET u.ultimo = 'Ganada' WHERE u.id = ?1");
        $ultimo->setParameter(1, $id);
          
        $separador = $em->createQuery('SELECT u.puntos, u.ultimo FROM App\Entity\User u WHERE u.id = ?1');
        $separador->setParameter(1, $id);

        $estado = $ultimo->getResult();
        $puntos = $suma->getResult();
        $student = $separador->getResult();
        // $student= $student+1;
        return $this->render('clasic/clasic.html.twig', [
            'nombre' => $student,
            'puntos' => $puntos,
            'resultado'=> $estado,
        ]); 
    }
  



    #[Route('/perdida', name: 'perdida')]
    public function perder(EntityManagerInterface $em,UserInterface $user): Response
    {
        $id = $user->getId();
     
        $suma = $em->createQuery("UPDATE App\Entity\User u SET u.puntos = u.puntos+0 WHERE u.id = ?1");
        $suma->setParameter(1, $id);

        $ultimo = $em->createQuery("UPDATE App\Entity\User u SET u.ultimo = 'Perdida' WHERE u.id = ?1");
        $ultimo->setParameter(1, $id);
          
        $separador = $em->createQuery('SELECT u.puntos, u.ultimo FROM App\Entity\User u WHERE u.id = ?1');
        $separador->setParameter(1, $id);

        $estado = $ultimo->getResult();
        $puntos = $suma->getResult();
        $student = $separador->getResult();
        // $student= $student+1;
        return $this->render('clasic/clasic.html.twig', [
            'nombre' => $student,
            'puntos' => $puntos,
            'resultado'=> $estado,
        ]); 
    }


    
    #[Route('/empatada', name: 'empatada')]
    public function Empatar(EntityManagerInterface $em,UserInterface $user): Response
    {
        $id = $user->getId();
     
        $suma = $em->createQuery("UPDATE App\Entity\User u SET u.puntos = u.puntos+1 WHERE u.id = ?1");
        $suma->setParameter(1, $id);

        $ultimo = $em->createQuery("UPDATE App\Entity\User u SET u.ultimo = 'Empatada' WHERE u.id = ?1");
        $ultimo->setParameter(1, $id);
          
        $separador = $em->createQuery('SELECT u.puntos, u.ultimo FROM App\Entity\User u WHERE u.id = ?1');
        $separador->setParameter(1, $id);

        $estado = $ultimo->getResult();
        $puntos = $suma->getResult();
        $student = $separador->getResult();
        // $student= $student+1;
        return $this->render('clasic/clasic.html.twig', [
            'nombre' => $student,
            'puntos' => $puntos,
            'resultado'=> $estado,
        ]); 
    }
 
 
}