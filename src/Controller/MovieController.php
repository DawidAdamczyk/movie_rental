<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Movie;

class MovieController extends AbstractController
{
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(Movie::class);

        $movies = $repository->findAll();
        

        return $this->render('Movie/list.html.twig', ['movies' => $movies]);
    }

    public function show($id)
    {
        $movie = $this->getDoctrine()
        ->getRepository(Movie::class)
        ->find($id);

        return $this->render('Movie/show.html.twig', ['movie' => $movie]);
    }
}