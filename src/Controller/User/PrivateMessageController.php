<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivateMessageController extends AbstractController
{
    #[Route('/message', name: 'app_user_private_message')]
    public function index(UserRepository $userRepository): Response
    {
//        A utiliser lorsque l'utilisateur aura son historique de messages
//        $idUser = $this->getUser()->getUserIdentifier();
//        $dataUser = $userRepository->findOneBy(["email" => $idUser]);

        $users = $userRepository->findAll();

        return $this->render('user/private-message.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/message/{id}', name: 'app_user_private_message_id', methods: ['GET'])]
    public function private(UserRepository $userRepository, int $id): Response
    {
        $idUser = $this->getUser()->getUserIdentifier();
        $dataUser = $userRepository->findOneBy(["email" => $idUser]);

        $user = $userRepository->findOneBy(["id" => $id]);
//        dd($user);

        return $this->render('user/private-message-id.html.twig', [
            'user_main' => $dataUser,
            'user_private' => $user
        ]);
    }
}