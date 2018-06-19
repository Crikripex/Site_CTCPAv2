<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 4/13/18
 * Time: 11:29 AM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function displayPage()
    {
        /*
        return new Response("
        <html>
            <body>
            <a href='/'>Accueil</a>
            <br>
            Ceci sera ma page d'accueil
                <nav>
                    <ul><a href='/prestations'>Prestations</a></ul>
                    <ul><a href='/documentation'>Documentation</a></ul>
                    <ul><a href='/calculs'>Calculs</a></ul>
                </nav>
            </body>
            </html>
        ");*/
        return $this->render('index.html.twig',[]);
    }

}