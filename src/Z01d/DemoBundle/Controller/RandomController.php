<?php
/**
 * Created by PhpStorm.
 * User: z01d
 * Date: 10/27/14
 * Time: 1:59 PM
 */

namespace Z01d\DemoBundle\Controller;

//use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomController extends Controller
{
    public function indexAction($limit)
    {

//        return new Response ('<html><body>Number:'.rand(1,$limit).'</body></html>');
        $number = rand(1, $limit);
        
        return $this->render(
            'Z01dDemoBundle:Random:index.html.twig',
            array('number' => $number)
        );
    }
}