<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chapters
 *
 * @ORM\Table(name="chapters")
 * @ORM\Entity
 */
class Chapters
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title_fr", type="string", length=128, nullable=false, options={"default"="title_fr"})
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
     * @ORM\Column(name="media", type="string", length=32, nullable=true)
     */
    private $media;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=32, nullable=true)
     */
    private $icon;

    /**
     * @return string
     */
    public function getTitleFr(): string
    {
        return $this->titleFr;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getContentEn(): string
    {
        return $this->contentEn;
    }

    /**
     * @return string
     */
    public function getContentFr(): string
    {
        return $this->contentFr;
    }

    /**
     * @return null|string
     */
    public function getMedia(): ?string
    {
        return $this->media;
    }

    /**
     * @return string
     */
    public function getTitleEn(): string
    {
        return $this->titleEn;
    }
}
