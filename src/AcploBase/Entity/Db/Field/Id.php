<?php
namespace AcploBase\Entity\Db\Field;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;

trait Id
{
    /**
     * Id da entidade na tabela do banco de dados
     *
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Form\Exclude()
     */
    protected $id;

    /**
     * Getter id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter id
     *
     * @param  int                  $id
     * @return \AcploBase\Db\Field\Id
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }
}
