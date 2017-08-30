<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EventosBundle\Entity\Evento;

class LoadEvento implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
    {
        $evento = new Evento();
        $evento->setName('name');
        $evento->setDescription('description');
        $evento->setSport('sport');

        $manager->persist($evento);
        $manager->flush();
    }

      public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}