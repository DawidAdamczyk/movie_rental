<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use App\Entity\Movie;
use App\Entity\Loan;


class LoanController extends AbstractController
{
    public function create(Request $request)
    {
        $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->find($request->request->get('user_id'));

        $movie = $this->getDoctrine()
        ->getRepository(Movie::class)
        ->find($request->request->get('movie_id'));

        $days = $request->request->get('day');

        $screenings = $request->request->get('seanse');

        $loan = new Loan();

        $loan->setMovie($movie);

        $loan->setUser($user);

        if ($days) {

            if ($movie->getSalePriceDay()) {
                $loan->setPrice($movie->getSalePriceDay()*$days);
            } else {
                $loan->setPrice($movie->getPriceDay()*$days);
            }
            $loan->setUsableUntil(date_create(date('Y-m-d', strtotime('now +'.$days.'days'))));
        } elseif ($screenings) {

            if ($movie->getSalePriceDay()) {
                $loan->setPrice($movie->getSalePriceSeanse()*$screenings);
            } else {
                $loan->setPrice($movie->getPriceSeanse()*$screenings);
            }
            $loan->setNumberScreenings($screenings);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($loan);
        $entityManager->flush();

        return new Response('dupa');
    }
}