<?php
/**
 * Created by PhpStorm.
 * User: crikripex
 * Date: 04/05/18
 * Time: 10:23
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\News;

class NewsController extends AbstractController
{
    public function displayPage()
    {
        $tab = $this->getInformationsFromDB();
        $args['Carousel'] = $this->getFirstThree($tab);
        $args['CarouselSize'] = count($args['Carousel'])-1;
        $args['List'] = $this->getOthers($tab);
        $args['ListSize'] = count($args['List'])-1;
        $args['descCarousel']= $this->makeDescriptions($args['Carousel']);
        $args['descList']= $this->makeDescriptions($args['List']);
        return $this->render('news.html.twig',$args);
    }

    public function getInformationsFromDB()
    {
        $repository = $this->getDoctrine()->getRepository(News::class);
        $datas = $repository->findBy([],['date'=>'DESC']);
        return $datas;
    }

    public function getFirstThree($tab)
    {
        $i = 0;
        $max = count($tab);
        if($max <=3)
            return $tab;
        return [$tab[0],$tab[1],$tab[2]];
    }
    public function getOthers($tab)
    {
        $i = 3;
        $max = count($tab);
        if($max <=3)
            return [];
        $returned = [];
        for($i;$i < $max;$i++){
            array_push($returned,$tab[$i]);
        }
        return $returned;
    }

    public function makeDescriptions($tab){
        $i = 0;
        $max = count($tab);
        $returned = [];
        for($i;$i < $max;$i++) {
            $tempItem = substr($tab[$i]->getContentFR(),0,150);
            array_push($returned,$tempItem);
        }
        return $returned;
    }
}