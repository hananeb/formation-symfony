<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Route("/hello/{name}", name="hello")
     * @param string $name
     * @return Response
     */
    public function index(string $name = 'world'): Response
    {
        return $this->render(
            'homepage/index.html.twig',
            ['name' => $name]
        );
    }

    /**
     * @Route("/contactOld", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('homepage/contact.html.twig');
    }

    /**
     * @Route("/show/{subject}", requirements={"subject": "\d+"})
     * @param int $subject
     * @return Response
     */
    public function showNumber(int $subject): Response
    {
        return new Response(sprintf('The number is %d', $subject));
    }

    /**
     * @Route("/show/{subject}", requirements={"subject": "[a-z]+"})
     * @param string $subject
     * @return Response
     */
    public function showString(string $subject): Response
    {
        return new Response(sprintf('The string is %s', $subject));
    }
}
