<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;

class IndexController extends AbstractController
{
    #[AttributeRoute('/', name: 'index')]
    public function index()
    {
        return $this->render('index/index.html.twig');
    }
}