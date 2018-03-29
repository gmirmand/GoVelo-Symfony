<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/bonnes-pratiques", name="bonnes-pratiques")
     */
    public function bonnesPratiquesAction(Request $request)
    {
        return $this->render('pages/bonnes-pratiques.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction(Request $request)
    {
        return $this->render('pages/cgu.html.twig');
    }

    /**
     * @Route("/assurance", name="assurance")
     */
    public function assuranceAction(Request $request)
    {
        return $this->render('pages/assurance.html.twig');
    }

    /**
     * @Route("/guide-utilisation", name="guide-utilisation")
     */
    public function guideAction(Request $request)
    {
        return $this->render('pages/guide-utilisation.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions-legales")
     */
    public function mentionsAction(Request $request)
    {
        return $this->render('pages/mentions-legales.html.twig');
    }
}
