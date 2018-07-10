<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\String_;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
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
     * @ORM\Column(name="content_fr", type="string", length=2048, nullable=false)
     */
    private $contentFr;

    /**
     * @var string
     *
     * @ORM\Column(name="content_en", type="string", length=2048, nullable=false)
     */
    private $contentEn;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_fr", type="string", length=64, nullable=false, options={"default"="contact_fr"})
     */
    private $contactFr = 'contact_fr';

    /**
     * @var string
     *
     * @ORM\Column(name="contact_en", type="string", length=64, nullable=false, options={"default"="contact_en"})
     */
    private $contactEn = 'contact_en';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \image
     *
     * @ORM\Column(name="image", type="string", nullable=true, options={"default"="NULL"})
     */
    private $image = NULL;

    /**
     * @return int
     */public function getId(): int
{
    return $this->id;
}

    public function getTitleFr()
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
     * @return string
     */public function getContentFr(): string
    {
        return $this->contentFr;
    }

/**
 * @return string
 */public function getContentEn(): string
    {
        return $this->contentEn;
    }

/**
 * @return string
 */public function getContactEn(): string
    {
        return $this->contactEn;
    }
/**
 * @return string
 */public function getContactFr(): string
    {
        return $this->contactFr;
    }
/**
 * @return \DateTime
 */public function getDate(): \DateTime
    {
        return $this->date;
    }
    /**
     * @return string
     */public function getImage(): string
    {
        if($this->image == NULL)
            return "NULL";
        return $this->image;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @param string $titleFr
     */
    public function setTitleFr(string $titleFr): void
    {
        $this->titleFr = $titleFr;
    }
    /**
     * @param string $titleEn
     */
    public function setTitleEn(string $titleEn): void
    {
        $this->titleEn = $titleEn;
    }
    /**
     * @param \image $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }
    /**
     * @param string $contentFr
     */
    public function setContentFr(string $contentFr): void
    {
        $this->contentFr = $contentFr;
    }
    /**
     * @param string $contentEn
     */
    public function setContentEn(string $contentEn): void
    {
        $this->contentEn = $contentEn;
    }
    /**
     * @param string $contactFr
     */
    public function setContactFr(string $contactFr): void
    {
        $this->contactFr = $contactFr;
    }
    /**
     * @param string $contactEn
     */
    public function setContactEn(string $contactEn): void
    {
        $this->contactEn = $contactEn;
    }
}
