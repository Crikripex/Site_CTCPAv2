<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Analysis
 *
 * @ORM\Table(name="analysis", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Analysis
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
     * @ORM\Column(name="content_en", type="string", length=2048, nullable=false, options={"default"="content_fr"})
     */
    private $contentEn = 'content_En';

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
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=32, nullable=true)
     */
    private $icon;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitleFr(): string
    {
        return $this->titleFr;
    }

    /**
     * @return string
     */
    public function getTitleEn(): string
    {
        return $this->titleEn;
    }

    /**
     * @return bool
     */
    public function isSimpleform(): bool
    {
        return $this->simpleform;
    }

    /**
     * @return bool
     */
    public function isCofrac(): bool
    {
        return $this->cofrac;
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
    public function getContentFr(): string
    {
        return $this->contentFr;
    }

    /**
     * @return string
     */
    public function getContentEn(): string
    {
        return $this->contentEn;
    }
    
}
