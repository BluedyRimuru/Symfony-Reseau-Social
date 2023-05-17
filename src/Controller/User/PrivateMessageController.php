<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivateMessageController extends AbstractController
{
    #[Route('/message', name: 'app_user_private_message')]
    public function index(): Response
    {
        return $this->render('user/private-message.html.twig', [

        ]);
    }
}