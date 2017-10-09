<?php
/**
 * Created by PhpStorm.
 * User: egiska33
 * Date: 05/10/2017
 * Time: 22:03
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class GeniusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {

        $templating = $this->container->get('templating');
        $html = $templating->render('genus/show.html.twig', [
            'name' => $genusName
        ]);

        return new Response($html);
    }
}