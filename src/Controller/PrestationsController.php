<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 04/05/18
 * Time: 10:28
 */

namespace App\Controller;

use App\Entity\Analysis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrestationsController extends AbstractController
{
    public function displayPage()
    {
        /*return new Response("
        <html>
            <body>
            <a href='/'>Accueil</a>
            <br>
            Ceci sera ma page de prestations
                <nav>
                    <ul><a href='/prestations'>Prestations</a></ul>
                    <ul><a href='/documentation'>Documentation</a></ul>
                    <ul><a href='/calculs'>Calculs</a></ul>
                </nav>
            </body>
            </html>
        ");*/
        $tab = $this->getInformationsFromDB();
        $args['BDD'] = $tab;
        return $this->render('prestations.html.twig',$args);

    }
    public function getInformationsFromDB(){
        $repository = $this->getDoctrine()->getRepository(Analysis::class);
        $datas = $repository->findAll();
        return $datas;
    }
}