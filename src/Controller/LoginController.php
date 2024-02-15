<?php
// src/Controller/LoginController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // Determine the target URL where the user should be redirected after login
        $targetUrl = $this->generateUrl('texts'); // Replace 'index' with the actual route name

        return $this->render('index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
           
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        // This method can be empty, as it will be intercepted by the logout key on your firewall
    }
}
