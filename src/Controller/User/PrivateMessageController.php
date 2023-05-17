<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivateMessageController extends AbstractController
{
    #[Route('/message', name: 'app_user_private_message')]
    public function index(UserRepository $userRepository): Response
    {
        $idUser = $this->getUser()->getUserIdentifier();
        $dataUser = $userRepository->findOneBy(["email" => $idUser]);

        $users = $userRepository->findAll();

        return $this->render('user/private-message.html.twig', [
            'users' => $users,
        ]);
    }
}