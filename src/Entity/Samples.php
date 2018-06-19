<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Samples
 *
 * @ORM\Table(name="samples")
 * @ORM\Entity
 */
class Samples
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
     * @ORM\Column(name="name_fr", type="string", length=16, nullable=false, options={"default"="name_fr"})
     */
    private $nameFr = 'name_fr';

    /**
     * @var string
     *
     * @ORM\Column(name="name_en", type="string", length=16, nullable=false, options={"default"="name_en"})
     */
    private $nameEn = 'name_en';

    /**
     * @var enum
     *
     * @ORM\Column(name="category", type="enum", nullable=false)
     */
    private $category;


}
