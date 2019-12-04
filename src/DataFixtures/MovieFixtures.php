<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $movie = new Movie();
        $movie->setTitle('Alien');
        $movie->setGenre('drama');
        $movie->setViewerAge(16);
        $movie->setPremiere(date_create('11-11-2019'));
        $movie->setDirector('xyz');
        $movie->setPicture(null);
        $movie->setDuration(112);
        $movie->setCountry('US');
        $movie->setDescription('nice movie');
        $movie->setPriceDay(5);
        $movie->setPriceSeanse(3);
        $movie->setSalePriceDay(null);
        $movie->setSalePriceSeanse(null);
        $manager->persist($movie);
        $manager->flush();
    }
}