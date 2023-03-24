<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\UserSrvice;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('', name: 'default')]
    public function getUserData(Request $request, UserSrvice $userSrvice): JsonResponse
    {
        $email = $request->get('email');

        $maybeUser = $userSrvice->getUserByEmail($email);

        $userData = $maybeUser
            ->map(fn(User $user) => [
                'name'  => $user->getName(),
                'email' => $user->getEmail(),
            ])
            ->getOrElse([
                'name'  => 'Unknown',
                'email' => 'Unavailable',
            ])
        ;


        return $this->json($userData);
    }
}
