<?php

namespace EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    // CRUD
    public function createAction(){
        $evento = new Evento();
        $evento->setName('Evento 1: Partido Voley')
        $evento->setDescription('Partido de voley la playa de la barceloneta, testing')
        $evento->setSport('Voley');

        $em = $this->getDoctrine()->getManager();
        $em->persist($evento);
        $em->flush();

        return new Response('Creado evento con id ' .$evento->getId() ' con nombre ' .$evento->getName()):
    }

    /**
     * @Route("/eventos")
     */
    public function indexAction()
    {
        return $this->render('EventosBundle:Default:index.html.twig');
    }


    /**
     * @Template()
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('EventosBundle:Evento');
        $evento = $repository->find($id);
         //$repository->findAll();       
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

   /**
     * @Template()
     */
    public function removeAction($id)
    {
      $evento = $repository->find($id);
      $em = $this->getDoctrine()->getManager();
      $em->remove($evento);
      $em->flush();  
    }


    // MORE
    private function getLastEventos()
    {
    	$date = new \DateTime('-10 days');
    	$repository = $this->getDoctrine()->getRepository('EventosBundle:Evento');
    	return $repository->findPublishedAfter($date);
    /*	$eventos = $repository->findPublishedAfter($date);;
    	return array('eventos' => $eventos)*/
    }


    /**
     * @Template()
     */
    public function lastEventosAction()
    {
        $date = new \DateTime('-10 days');
        $repository = $this->getDoctrine()->getRepository('EventosBundle:Evento');
        //return $repository->findPublishedAfter($date);
        $eventos = $repository->findPublishedAfter($date);;
        return array('eventos' => $eventos);
    }
}
