<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 20/04/18
 * Time: 14:09
 */

namespace App\Controller;

use App\Entity\MaterialsMigration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CalculMigrationController extends AbstractController
{
    public function displayPage()
    {
        $tab = $this->getInformationsFromDB();
        $args['BDD'] = $tab;

        return $this->render('outilMigration.html.twig',$args);

    }

    public function getInformationsFromDB(){
        $repository = $this->getDoctrine()->getRepository(MaterialsMigration::class);
        $datas = $repository->findAll();
        return $datas;
    }
}