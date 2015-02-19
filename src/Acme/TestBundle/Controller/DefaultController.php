<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Hello {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $name = $request->attributes->get('name');
//        $response = 'Hello '.$name.'!';
        $data = new Hello($name);
        
        $response = json_encode($data);
//        return new Response($response);
        return $this->render('AcmeTestBundle:Default:index.html.twig', array('name' => $name));
    }
    public function testAction()
    {
        $a = 5;
        exit('='.$a * 3);
//        return $this->render('AcmeTestBundle:Default:index.html.twig', array('name' => $name));
    }
}
