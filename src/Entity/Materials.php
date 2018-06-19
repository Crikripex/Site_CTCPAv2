<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materials
 *
 * @ORM\Table(name="materials")
 * @ORM\Entity
 */
class Materials
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
     * @ORM\Column(name="name", type="string", length=16, nullable=false, options={"default"="name"})
     */
    private $name = 'name';

    /**
     * @var float
     *
     * @ORM\Column(name="temperature_effect", type="float", precision=10, scale=0, nullable=false)
     */
    private $temperatureEffect;

    /**
     * @var float
     *
     * @ORM\Column(name="barrier_effect", type="float", precision=10, scale=0, nullable=false)
     */
    private $barrierEffect;

    /**
     * @var float
     *
     * @ORM\Column(name="h2o_activation_energy", type="float", precision=10, scale=0, nullable=false)
     */
    private $h2oActivationEnergy;

    /**
     * @var float
     *
     * @ORM\Column(name="h2o_pre_exponential_factor", type="float", precision=10, scale=0, nullable=false)
     */
    private $h2oPreExponentialFactor;

    /**
     * @var float
     *
     * @ORM\Column(name="o2_activation_energy", type="float", precision=10, scale=0, nullable=false)
     */
    private $o2ActivationEnergy;

    /**
     * @var float
     *
     * @ORM\Column(name="o2_pre_exponential_factor_first_term", type="float", precision=10, scale=0, nullable=false)
     */
    private $o2PreExponentialFactorFirstTerm;

    /**
     * @var float
     *
     * @ORM\Column(name="o2_pre_exponential_factor_second_term", type="float", precision=10, scale=0, nullable=false)
     */
    private $o2PreExponentialFactorSecondTerm;

    /**
     * @var float
     *
     * @ORM\Column(name="o2_pre_exponential_factor_third_term", type="float", precision=10, scale=0, nullable=false)
     */
    private $o2PreExponentialFactorThirdTerm;

    /**
     * @var bool
     *
     * @ORM\Column(name="permeabilityTool", type="boolean", nullable=false, options={"default"="1"})
     */
    private $permeabilitytool = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="migrationTool", type="boolean", nullable=false, options={"default"="1"})
     */
    private $migrationtool = '1';


}
