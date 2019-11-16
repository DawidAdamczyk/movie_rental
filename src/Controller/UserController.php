<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\UserType;
use App\Form\UserEditType;


class UserController extends AbstractController 
{
    public function index(int $id)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('index');
         }

         $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('User/index.html.twig', ['user' => $user]);

         
    }

    public function edit(int $id, Request $request, User $user)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('index');
         }

         $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->find($id);

        // $user = new User();
        $form = $this->createForm(UserEditType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            $user->setEmail($data['email']);
            $user->setName($data['name']);
            $user->setLastname($data['lastname']);
            $user->getCardNumber($data['card_number']);
            $user->setBirthDate($data['birth_date']);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('User/edit.html.twig', ['user' => $user, 'form' =>  $form->createView()]);
    }
}