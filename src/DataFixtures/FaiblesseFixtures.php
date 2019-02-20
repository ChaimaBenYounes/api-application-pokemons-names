<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Faiblesse;
use App\Service\ReadJsonFile;

class FaiblesseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

    $JSONFile = new ReadJsonFile();

        foreach ($JSONFile->decode('type_faiblesse.json') as $faiblesse) {
            $oFaiblesse = new Faiblesse();
            $oFaiblesse->setName($faiblesse);
            $manager->persist($oFaiblesse);
        }

        $manager->flush();
    }
}
