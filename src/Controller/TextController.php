<?php
// src/Controller/TextController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Texts;
use App\Entity\Users;

#[IsGranted('ROLE_USER')]
class TextController extends AbstractController
{
   
    #[Route('/texts', name: 'texts_show', methods: ['GET'])]
    public function show(EntityManagerInterface $entityManager): Response
    {
        
        // Obtén los textos asociados con el usuario actual
        $texts = $entityManager->getRepository(Texts::class)->findAll();
    
        return $this->render('texts.html.twig', ['texts' => $texts]);
    }


    #[Route('new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Handle form submission and entity persistence here
       // Obtener el usuario autenticado
    

        // Procesar el formulario cuando se envía
        if ($request->isMethod('POST')) {
            $description = $request->request->get('newDescription');
            $content = $request->request->get('newContent');
            $userId = $request->request->get('newUserId');
            $genre = $request->request->get('newGenre');
            $privacy = $request->request->get('newPrivacy');
    
            $text = new Texts();
            $text->setDescription($description);
            $text->setContent($content);
            $text->setUserId($userId);
            $text->setGenre($genre);
            $text->setPrivacy($privacy);
    
          
    
            $entityManager->persist($text);
            $entityManager->flush();
        
    
        return $this->redirectToRoute('texts');
    }
// Renderizar el formulario en la página de subir textos
return $this->render('uploadtext.html.twig');
}
   
#[Route('/profile', name: 'profile')]
public function showProfile(): Response
{
    // Obtén el usuario actualmente autenticado
    $user = $this->getUser();

    // Renderiza la plantilla y pasa los datos del usuario
    return $this->render('profile.html.twig', ['user' => $user]);
}

#[Route('/search', name: 'search', methods: ['GET', 'POST'])]
public function search(Request $request, EntityManagerInterface $entityManager): Response
{
    if ($request->isMethod('POST')) {
        // Procesa la solicitud POST y realiza la búsqueda en la tabla Users
        $username = $request->request->get('username');

        $userId = 38; // Valor por defecto

      

        // Utiliza findOneBy en lugar de findBy para obtener un solo resultado
        $users = $entityManager->getRepository(Users::class)->findBy(['name' => $username]);

        // Agrega los resultados de la búsqueda en Users al array de resultados
        $results['users'] = $users;

    

        // Redirige a la vista de resultados con los usuarios encontrados
        return $this->render('search_users_results.html.twig', ['results' => $results, 'username' => $username]);
    }

    // Si es una solicitud GET, simplemente renderiza el formulario de búsqueda
    return $this->render('search.html.twig');
}




#[Route('/search2', name: 'search2', methods: ['GET', 'POST'])]
public function searchGenreResults(Request $request, EntityManagerInterface $entityManager): Response
{
    if ($request->isMethod('POST')) {
        $selectedGenre = $request->request->get('genre');

        // Realiza la búsqueda de textos por género en la base de datos
        $texts = $entityManager->getRepository(Texts::class)->findBy(['genre' => $selectedGenre]);

        // Agrega los resultados de la búsqueda en el array de resultados
        $results['texts'] = $texts;

        // Redirige a la vista de resultados con los textos encontrados y el género seleccionado
        return $this->render('search_genre_results.html.twig', ['results' => $results, 'selectedGenre' => $selectedGenre]);
    }

    // Si es una solicitud GET, simplemente renderiza el formulario de búsqueda
    return $this->render('search2.html.twig');
}

}

