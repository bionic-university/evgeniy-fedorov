<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Mailer;
use Acme\StoreBundle\Newsletter\NewsletterManager;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction()
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem Ipsum Dolor');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id ' . $product->getid());
    }

    public function showAction($id)
    {
        //direct call to mailer
        $mailer = new Mailer('swiftmailer');

        //call to mailer via service
        $mailer = $this->get('my_mailer');
        $mailer->send('ryan@foobar.net');

        $mailer = $this->get('my_mailer');
        $newsletter = new NewsletterManager($mailer);

        $product = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id ' . $id);
        }

        return new Response('Found a product with id ' . $product->getId());
    }

    public function findAction()
    {
        $repository = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product');
        $query = $repository->createQueryBuilder('p')
            ->where('p.price > :price')
            ->setParameter('price', '19.98')
            ->orderBy('p.price', 'ASC')
            ->getQuery();

        $products = $query->getResult();

        return new Response('Found ' . count($products) . ' products by your criteria');
    }
}
