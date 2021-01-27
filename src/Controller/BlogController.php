<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

class BlogController extends AbstractController
{
    /**
    * @Route("/blog", name="blog/")
    */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'posts' => $postRepository->findAll(),
        ]);
    }


    /*public function editTitle(): String 
    {
        $slugger = new AsciiSlugger();
        $safeFileName = $slugger->slug($title->getName());
        return $safeFileName;
    }*/
}
