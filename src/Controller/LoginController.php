<?php
// src/Controller/LoginController.php
namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Controller\RegistrationFormType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

     

        return $this->render('index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
           
           
        ]);
    }
    public function getUserId($userId, EntityManagerInterface $entityManager): Response
    {
        $userId = $entityManager->getRepository(Users::class)->findOneBy(['id' => $userId]);
   
    }
    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        // This method can be empty, as it will be intercepted by the logout key on your firewall
    }
    #[Route('/register', name:'register')]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        // Procesar el formulario cuando se envía
        if ($request->isMethod('POST')) {
            $name = $request->request->get('newName');
            $email = $request->request->get('newEmail');
         
            $password = $request->request->get('newPassword');
            $profile = $request->request->get('newProfile');
    
            $user = new Users();
            $user->setName($name);
            $user->setEmail($email);
         
            $user->setPassword($passwordHasher->hashPassword($user, $password));
            $user->setProfile($profile);
    
          
    
            $entityManager->persist($user);
            $entityManager->flush();
  
  // Redirigir a otra página después del registro (puedes ajustar la ruta según tus necesidades)
  return $this->redirectToRoute('/texts/{userId}');
}

// Renderizar el formulario en la página de registro
return $this->render('register.html.twig');
}
}