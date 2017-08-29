<?php

namespace EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('EventosBundle:Default:index.html.twig');
    }


    /**
     * @Template()
     */
    public function showAction(Evento $evento)
    {
    	return array(
    		'last_eventos' => $this->getLastEventos(),
    		'evento' => $evento);
    }


    private function getLastEventos()
    {
    	$date = new \DateTime('-10 days');
    	$repository = $this->getDoctrine()->getRepository('EventosBundle:Evento');
    	//return $repository->findPublishedAfter($date);
    	$eventos = $repository->findPublishedAfter($date);;
    	return array('eventos' => $eventos)
    }
}
