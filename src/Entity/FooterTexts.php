<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FooterTexts
 *
 * @ORM\Table(name="footer_texts")
 * @ORM\Entity
 */
class FooterTexts
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
     * @ORM\Column(name="content_fr", type="string", length=4096, nullable=false, options={"default"="content_fr"})
     */
    private $contentFr = 'content_fr';

    /**
     * @var string
     *
     * @ORM\Column(name="content_en", type="string", length=4096, nullable=false, options={"default"="content_en"})
     */
    private $contentEn = 'content_en';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastModified = 'CURRENT_TIMESTAMP';


}
