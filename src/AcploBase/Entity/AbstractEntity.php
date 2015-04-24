<?php

/**
 * Definição de uma classe abstrata para as Entidades
 *
 * @package   AcploBase\Entity
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
namespace AcploBase\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;

/**
 * Definição de uma classe abstrata para as Entidades
 *
 * @package   AcploBase\Entity
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 *
 * @ORM\MappedSuperclass
 * @Form\Name("entity") Not necessary, but there must be at least one line with Form to use the "use" statement without complains from IDE and cs-fixer
 */
abstract class AbstractEntity
{
    use Db\Field\Id, Db\Field\Created, Db\Field\Updated;

    /**
     * Construtor
     */
    public function __construct()
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
    }
}
