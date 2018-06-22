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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getTemperatureMax(): int
    {
        return $this->temperatureMax;
    }

    /**
     * @param int $temperatureMax
     */
    public function setTemperatureMax(int $temperatureMax): void
    {
        $this->temperatureMax = $temperatureMax;
    }

    /**
     * @return int
     */
    public function getBarrierEffect(): int
    {
        return $this->barrierEffect;
    }

    /**
     * @param int $barrierEffect
     */
    public function setBarrierEffect(int $barrierEffect): void
    {
        $this->barrierEffect = $barrierEffect;
    }

    /**
     * @return int
     */
    public function getTemperatureEffect(): int
    {
        return $this->temperatureEffect;
    }

    /**
     * @param int $temperatureEffect
     */
    public function setTemperatureEffect(int $temperatureEffect): void
    {
        $this->temperatureEffect = $temperatureEffect;
    }


}
