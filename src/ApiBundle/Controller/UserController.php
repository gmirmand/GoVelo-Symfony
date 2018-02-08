<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; 
use ApiBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/users")
     */
    public function getAllUsersAction()
    {
        $users = $this->getDoctrine()
        ->getRepository(User::class)
        ->findAll();
        
        // Création d'une vue FOSRestBundle
        $view = View::create($users);
        $view->setFormat('json');
        
        return $view;
        
    }
    
    
    /**
     * @Rest\View()
     * @Rest\Get("/users/{id}")
     */
    public function getUsersAction($id, Request $request)
    {
        $users = $this->getDoctrine()
        ->getRepository(User::class)
        ->find($request->get('id'));
        
         if (!$users) {
            throw $this->createNotFoundException(
                'No Users found for id '.$id
            );
        }

        // Création d'une vue FOSRestBundle
        $view = View::create($users);
        $view->setFormat('json');

        return $view;
        
    }
}
