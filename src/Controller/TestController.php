<?php

namespace App\Controller;

use App\Service\TestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

     /**
     * @Route("/service", name="launch_service")
     */
    public function service(TestService $ts)
    {
        $output = $ts->someMethod();

        return $this->render('test/service-output.html.twig', [
            'output' => $output,
        ]);
    }
}
