<?php
/**
 * Created by PhpStorm.
 * User: Elise
 * Date: 13/01/2018
 * Time: 15:08
 */

namespace app\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Formule
 * @ORM\Entity
 * @ORM\Table(name="formule")
 * @package app\Entity
 */
class Formule
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $iduser;

    /**
     * @ORM\Column(type="string")
     */

    private $formule;

}