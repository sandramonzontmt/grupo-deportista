<?php

namespace EventosBundle\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class EventoController extends Controller { 

  public function showAction($id)
  {
    $repository = $this->getDoctrine()->getRepository('EventosBundle:Evento');
   	$evento = $repository->find($id);

   /*$recetas = // usa la variable $slug para consultar la base de datos return 
   // COMO¿? En el tema 1 php bin/console doctrine:schema:create dice que no hay metadata to process. Y en la documentacion no mencionais nada de como funciona slug.

   $this->render('EventosBundle:Eventos:show.html.twig', array('eventos' => $eventos, )); */
  }

    /**
     * @Route("/eventos")
     */
    public function indexAction()
    {
        return $this->render('EventosBundle:Default:index.html.twig');
    }


} 