<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChaptersPdf
 *
 * @ORM\Table(name="chapters_pdf", indexes={@ORM\Index(name="chapter_id", columns={"chapter_id"})})
 * @ORM\Entity
 */
class ChaptersPdf
{
    /**
     * @var string
     *
     * @ORM\Column(name="title_fr", type="string", length=128, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=128, nullable=false)
     */
    private $titleEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path", type="string", length=32, nullable=true)
     */
    private $path;

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
