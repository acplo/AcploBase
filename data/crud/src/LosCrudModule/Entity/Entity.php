<?php
namespace __MODULENAME__\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;
use AcploBase\Entity\AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="__MODULEDASHEDNAME__")
 * @Form\Name("form__MODULENAME__")
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Form\Type("AcploBase\Form\AbstractForm")
 */
class __MODULENAME__ extends AbstractEntity
{
}
