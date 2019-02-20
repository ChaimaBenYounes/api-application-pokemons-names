<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pokemon;
use App\Service\ReadJsonFile;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $JSONFile = new ReadJsonFile();

        foreach ($JSONFile->decode('pokemons.json') as $pokemon) {
             $oPokemon = new Pokemon();
             $oPokemon->setNom($pokemon);
             $manager->persist($oPokemon);
         }

        $manager->flush();
    }
}
