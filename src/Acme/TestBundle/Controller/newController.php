<?php

namespace Acme\TestBundle\Controller;

use Acme\TestBundle\Entity\Product;
use Acme\TestBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Item{
    function __construct($name,$price) {
        $this->name = $name;
        $this->price = $price;
    }
    
}


class newController extends Controller{
    
    public function newAction(){
        $name = 'nalin';
        $price = 100;
        $data = new Item($name,$price);
        $response = json_encode($data);
        return new Response($response);
    }
    
    public function persistAction(){
        $category = new Category();
        $category->setName('Main Products');
        $category->setDescription('hhhhhhhh');

        $product = new Product();
        $product->setName('Foo');
        $product->setPrice(19.99);
        $product->setDescription('Lorem ipsum dolor');
        // relate this product to the category
        $product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();
        
        return new Response('Created product id: '.$product->getId()
            .' and category id: '.$category->getId());
    }
    
    public function showPersistAction($id){
        $product = $this->getDoctrine()->getRepository('Acme\TestBundle\Entity\Product')->find($id);
      
        if(!$product){
            throw $this->createNotFoundException('No product found ');
        }  else {
            return new Response('id '.$id.' name = '.$product->getName());
        }
        return;
    }
    
    public function updatePersistAction($id){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('Acme\TestBundle\Entity\Product')->find($id);
        $oldName = $product->getName();
        $product->setName('new baedr '.$oldName);
        $em->flush();
        if(!$product){
            throw $this->createNotFoundException('No product found ');
        }
        return $this->redirect($this->generateUrl('homepage'));
    }
    public function randomQueryAction(){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('Acme\TestBundle\Entity\Product')->findAllOrderedByPrice();
        if(!$product){
            throw $this->createNotFoundException('No product found ');
        }
        
        $str = '';
        foreach ($product as $value){
            $str = $str.$value->getName().'***';
            
        }
        return new Response('name = '.$str);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

