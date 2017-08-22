<?php

namespace EventosBundle\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 


class EventosController extends Controller { 

 public function showAction($slug)  { 

   $recetas = // usa la variable $slug para consultar la base de datos return 
   // COMO¿? En el tema 1 php bin/console doctrine:schema:create dice que no hay metadata to process. Y en la documentacion no mencionais nada de como funciona slug.

   $this->render('EventosBundle:Eventos:show.html.twig', array('eventos' => $eventos, )); 

  } 

} 