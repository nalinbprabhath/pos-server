<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiController
 *
 * @author Nalin Buddhika
 */
namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    
    public function getResources() {
        return array(
            'Categories' => 'Acme\TestBundle\Entity\Category',
            'Products' => 'Acme\TestBundle\Entity\Product',
        );
    }

//    public function apiAction(Request $request)
//    {
//
//        $response = parent::apiAction($request);
//
//        return $response;
//    }
//    
    public function apiAction(Request $request)
    {
        $api = $this->container->get('adrotec_webapi');

        $api->addResources(array(
            'Categories' => 'Acme\TestBundle\Entity\Category',
            'Products' => 'Acme\TestBundle\Entity\Product',
        ));

        // $request->attributes->set($request->attributes->get('resource'));

        $response = $api->handle($request);

        return $response;
    }

}
