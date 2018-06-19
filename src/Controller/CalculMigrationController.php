<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 20/04/18
 * Time: 14:09
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CalculMigrationController extends AbstractController
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
        return $this->render('base.html.twig',[]);

    }
}