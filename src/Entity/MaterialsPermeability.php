<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialsPermeability
 *
 * @ORM\Table(name="materials_permeability")
 * @ORM\Entity
 */
class MaterialsPermeability
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
     * @ORM\Column(name="h2o_activation_energy", type="integer", nullable=false)
     */
    private $h2oActivationEnergy;

    /**
     * @var int
     *
     * @ORM\Column(name="h2o_pre_exponential_factor", type="integer", nullable=false)
     */
    private $h2oPreExponentialFactor;

    /**
     * @var int
     *
     * @ORM\Column(name="o2_activation_energy", type="integer", nullable=false)
     */
    private $o2ActivationEnergy;

    /**
     * @var int
     *
     * @ORM\Column(name="o2_pre_exponential_factor_first_term", type="integer", nullable=false)
     */
    private $o2PreExponentialFactorFirstTerm;

    /**
     * @var int
     *
     * @ORM\Column(name="o2_pre_exponential_factor_second_term", type="integer", nullable=false)
     */
    private $o2PreExponentialFactorSecondTerm;

    /**
     * @var int
     *
     * @ORM\Column(name="o2_pre_exponential_factor_third_term", type="integer", nullable=false)
     */
    private $o2PreExponentialFactorThirdTerm;


}
