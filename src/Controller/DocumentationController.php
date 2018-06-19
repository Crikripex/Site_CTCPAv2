<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 20/04/18
 * Time: 11:33
 */

namespace App\Controller;

use App\Entity\Chapters;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;



class DocumentationController extends AbstractController
{

    private $pathPackage;

    public function displayPage()
    {
        $tab = $this->getInformationsFromDB();
        $args['BDD'] = $tab;

        return $this->render('documentation.html.twig',$args);

    }

    public function getInformationsFromDB(){
        $repository = $this->getDoctrine()->getRepository(Chapters::class);
        $datas = $repository->findAll();
        return $datas;
    }

}