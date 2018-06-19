<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialsMigration
 *
 * @ORM\Table(name="materials_migration")
 * @ORM\Entity
 */
class MaterialsMigration
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
     * @ORM\Column(name="name", type="string", length=16, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="temperature_max", type="integer", nullable=false)
     */
    private $temperatureMax;

    /**
     * @var int
     *
     * @ORM\Column(name="barrier_effect", type="integer", nullable=false)
     */
    private $barrierEffect;

    /**
     * @var int
     *
     * @ORM\Column(name="temperature_effect", type="integer", nullable=false)
     */
    private $temperatureEffect;


}
