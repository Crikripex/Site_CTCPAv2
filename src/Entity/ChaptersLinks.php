<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChaptersLinks
 *
 * @ORM\Table(name="chapters_links", indexes={@ORM\Index(name="chapter_id", columns={"chapter_id"})})
 * @ORM\Entity
 */
class ChaptersLinks
{
    /**
     * @var string
     *
     * @ORM\Column(name="title_fr", type="string", length=64, nullable=false)
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=64, nullable=false)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=256, nullable=false)
     */
    private $ref;

    /**
     * @var \Chapters
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Chapters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chapter_id", referencedColumnName="id")
     * })
     */
    private $chapter;


}
