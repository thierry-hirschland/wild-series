<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    const SEASONS = [
        1 => [
            'year' => 2010,
            'description' => "La population entière a été ravagée par une épidémie d'origine inconnue, qui est envahie par les morts-vivants. ",
            'program' => "program_1",
        ],
        2 => [
            'year' => 2011,
            'description' => "Le groupe de survivants mené par Rick Grimes tente de survivre dans un monde envahi par les rôdeurs.",
            'program' => "program_1",
        ],
        3 => [
            'year' => 2012,
            'description' => "Après l'attaque de la ferme des Green par les morts-vivants, le groupe de Rick Grimes trouve refuge dans une prison infestée par les rôdeurs.",
            'program' => "program_1",
        ],
        4 => [
            'year' => 2013,
            'description' => "Le Gouverneur, en cavale après les événements de la saison précédente, rejoint un autre groupe et se prépare à attaquer la prison à nouveau.",
            'program' => "program_1",
        ],
        5 => [
            'year' => 2014,
            'description' => "Après l'enfermement du groupe de Rick dans le wagon A au Terminus.",
            'program' => "program_1",
        ],
        6 => [
            'year' => 2015,
            'description' => "sldfjsdlfjdsfksdflskfjslkfjslfkjsfdlksjlksdfj",
            'program' => "program_1",
        ],
    ];

    public function load(ObjectManager $manager)
    {
        $i = 1;
        foreach (self::SEASONS as $number => $data) {
            $season = new Season();
            $season->setNumber($number);
            $season->setYear($data['year']);
            $season->setDescription($data['description']);
            $season->setProgram($this->getReference($data['program']));
            $manager->persist($season);
            $this->addReference('season_' . $i, $season);
            $i++;
        };

        $faker = Faker\Factory::create('fr_FR');
        $nbSaison = 7;
        for ($i=2; $i < 6; $i++) {
            for ($j=1; $j <= 12; $j++) {
                $season = new Season();
                $season->setNumber($j);
                $season->setYear($faker->numberBetween(1950, 2021));
                $season->setDescription($faker->text(200));
                $season->setProgram($this->getReference('program_' . $i));
                $manager->persist($season);
                $this->addReference('season_' . $nbSaison, $season);
                $nbSaison++;
            }
        };
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}
