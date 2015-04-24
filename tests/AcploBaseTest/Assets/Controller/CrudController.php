<?php
namespace AcploBaseTest\Assets\Controller;

use AcploBase\Controller\AbstractCrudController;

class CrudController extends AbstractCrudController
{
    public function getEntityClass()
    {
        return 'AcploBaseTest\Assets\Entity\TestEntity';
    }

    public function getEntityServiceClass()
    {
        return 'AcploBaseTest\Assets\Service\TestService';
    }
}
