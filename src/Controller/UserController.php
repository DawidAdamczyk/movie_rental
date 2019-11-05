<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;

class UserController extends AbstractController 
{
    public function index()
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('index');
         } 
    }
}