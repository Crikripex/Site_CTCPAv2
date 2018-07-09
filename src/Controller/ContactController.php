<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 04/05/18
 * Time: 10:53
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function displayPage()
    {
        /*return new Response("
        <html>
            <body>
            <a href='/'>Accueil</a>
            <br>
            Ceci sera ma page de documentattion
                <nav>
                    <ul><a href='/prestations'>Prestations</a></ul>
                    <ul><a href='/documentation'>Documentation</a></ul>
                    <ul><a href='/calculs'>Calculs</a></ul>
                </nav>
            </br>
            </html>
        ");*/
        return $this->render('contact.html.twig',[]);

    }
}