<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Common\Persistence\ObjectManager;
use App\Service\ReadJsonFile;

class TypeFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $JSONFile = new ReadJsonFile();

        foreach ($JSONFile->decode('type_faiblesse.json') as $type) {
            $oType = new Type();
            $oType->setName($type);
            $manager->persist($oType);
        }

        $manager->flush();
    }
}
