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

#[IsGranted('ROLE_USER')]
class TextController extends AbstractController
{
    #[Route('/texts', name: 'texts_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $texts = $entityManager->getRepository(Texts::class)->findAll();
dump($texts);
        return $this->render('texts.html.twig', ['texts' => $texts]);
    }

    #[Route('/texts/{id}', name: 'texts_show', methods: ['GET'])]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $text = $entityManager->getRepository(Texts::class)->find($id);

        if (!$text) {
            throw $this->createNotFoundException('Text not found');
        }

        return $this->render('texts/show.html.twig', ['text' => $text]);
    }

    #[Route('/texts/new', name: 'texts_new', methods: ['GET', 'POST'])]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Handle form submission and entity persistence here

        return $this->redirectToRoute('texts_index');
    }

    #[Route('/texts/edit/{id}', name: 'texts_edit', methods: ['GET', 'POST'])]
    public function edit(EntityManagerInterface $entityManager, Request $request, $id): Response
    {
        $text = $entityManager->getRepository(Texts::class)->find($id);

        if (!$text) {
            throw $this->createNotFoundException('Text not found');
        }

        // Handle form submission and entity persistence here

        return $this->redirectToRoute('texts_index');
    }

    #[Route('/texts/delete/{id}', name: 'texts_delete', methods: ['DELETE'])]
    public function delete(EntityManagerInterface $entityManager, $id): Response
    {
        $text = $entityManager->getRepository(Texts::class)->find($id);

        if (!$text) {
            throw $this->createNotFoundException('Text not found');
        }

        $entityManager->remove($text);
        $entityManager->flush();

        return $this->redirectToRoute('texts_index');
    }
}
