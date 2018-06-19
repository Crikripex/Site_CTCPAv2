<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubAnalysis
 *
 * @ORM\Table(name="sub_analysis", indexes={@ORM\Index(name="id_analysis", columns={"id_analysis"})})
 * @ORM\Entity
 */
class SubAnalysis
{
    /**
     * @var string
     *
     * @ORM\Column(name="title_fr", type="string", length=128, nullable=false, options={"default"="title_fr"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $titleFr = 'title_fr';

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=128, nullable=false, options={"default"="title_en"})
     */
    private $titleEn = 'title_en';

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
     * @var bool
     *
     * @ORM\Column(name="simpleForm", type="boolean", nullable=false)
     */
    private $simpleform = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="cofrac", type="boolean", nullable=false)
     */
    private $cofrac = '0';

    /**
     * @var \Analysis
     *
     * @ORM\ManyToOne(targetEntity="Analysis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_analysis", referencedColumnName="id")
     * })
     */
    private $idAnalysis;


}
