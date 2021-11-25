<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function home($name): Response
    {
        return $this->render('home.html.twig', ['name' => $name]);
    }
    
}
