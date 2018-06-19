<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Text
 *
 * @ORM\Table(name="text", indexes={@ORM\Index(name="id_analysis", columns={"id_analysis"})})
 * @ORM\Entity
 */
class Text
{
    /**
     * @var string
     *
     * @ORM\Column(name="content_fr", type="string", length=2048, nullable=false, options={"default"="content_fr"})
     */
    private $contentFr = 'content_fr';

    /**
     * @var string
     *
     * @ORM\Column(name="content_en", type="string", length=2048, nullable=false, options={"default"="content_en"})
     */
    private $contentEn = 'content_en';

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=32, nullable=true)
     */
    private $image;

    /**
     * @var \Analysis
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Analysis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_analysis", referencedColumnName="id")
     * })
     */
    private $idAnalysis;


}
