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
use ApiBundle\Entity\announcement;

class AnnouncementController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/announcements")
     */
    public function getAllAnnouncementsAction()
    {
        $announcements = $this->getDoctrine()
        ->getRepository(announcement::class)
        ->findAll();
        
        // Création d'une vue FOSRestBundle
        $view = View::create($announcements);
        $view->setFormat('json');

        return $view;
        
    }
    
    /**
     * @Rest\View()
     * @Rest\Get("/announcements/{id}")
     */
    public function getAnnouncementsAction($id, Request $request)
    {
        $announcement = $this->getDoctrine()
        ->getRepository(announcement::class)
        ->find($request->get('id'));

        if (!$announcement) {
            throw $this->createNotFoundException(
                'No announcement found for id '.$id
            );
        }
        
        // Création d'une vue FOSRestBundle
        $view = View::create($announcement);
        $view->setFormat('json');

        return $view;
    }
}
