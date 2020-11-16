<?php

namespace App\DataFixtures;

use App\Entity\Feature;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        /*  Usuario Juan y sus características */
        $userJuan = new User();
        $userJuan->setName('Juan');
        $userJuan->setCreatedAt(new \DateTime("now"));
        $userJuan->setUpdatedAt(new \DateTime("now"));
        $manager->persist($userJuan);

        $feature = new Feature();
        $feature->setFeature('color de los ojos');
        $feature->setFeatureInfo('azul claro');
        $feature->setCreatedAt(new \DateTime("now"));
        $feature->setUpdatedAt(new \DateTime("now"));
        $feature->setUser($userJuan);
        $manager->persist($feature);

        $feature = new Feature();
        $feature->setFeature('color del coche');
        $feature->setFeatureInfo('azul claro');
        $feature->setCreatedAt(new \DateTime("now"));
        $feature->setUpdatedAt(new \DateTime("now"));
        $feature->setUser($userJuan);
        $manager->persist($feature);

        /*  Usuario Manuel y sus características */
        $userManuel = new User();
        $userManuel->setName('Manuel');
        $userManuel->setCreatedAt(new \DateTime("now"));
        $userManuel->setUpdatedAt(new \DateTime("now"));
        $manager->persist($userManuel);

        $feature = new Feature();
        $feature->setFeature('color de los ojos');
        $feature->setFeatureInfo('azul oscuro');
        $feature->setCreatedAt(new \DateTime("now"));
        $feature->setUpdatedAt(new \DateTime("now"));
        $feature->setUser($userManuel);
        $manager->persist($feature);

        $feature = new Feature();
        $feature->setFeature('color del coche');
        $feature->setFeatureInfo('azul claro');
        $feature->setCreatedAt(new \DateTime("now"));
        $feature->setUpdatedAt(new \DateTime("now"));
        $feature->setUser($userManuel);
        $manager->persist($feature);

        /*  Usuario Irene y sus características */
        $userIrene = new User();
        $userIrene->setName('Irene');
        $userIrene->setCreatedAt(new \DateTime("now"));
        $userIrene->setUpdatedAt(new \DateTime("now"));
        $manager->persist($userIrene);

        $feature = new Feature();
        $feature->setFeature('color del coche');
        $feature->setFeatureInfo('azulados');
        $feature->setCreatedAt(new \DateTime("now"));
        $feature->setUpdatedAt(new \DateTime("now"));
        $feature->setUser($userIrene);
        $manager->persist($feature);

        $feature = new Feature();
        $feature->setFeature('color de la casa');
        $feature->setFeatureInfo('azul');
        $feature->setCreatedAt(new \DateTime("now"));
        $feature->setUpdatedAt(new \DateTime("now"));
        $feature->setUser($userIrene);
        $manager->persist($feature);


        $manager->flush();
    }
}
