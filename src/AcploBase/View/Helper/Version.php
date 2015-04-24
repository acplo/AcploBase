<?php
/**
 * View Helper that shows the system's version
 *
 * @package   AcploBase\View\Helper
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
namespace AcploBase\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * View Helper that shows the system's version
 *
 * @package   AcploBase\View\Helper
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
class Version extends AbstractHelper
{
    public function __invoke()
    {
        if (!file_exists('data/version.txt')) {
            $version = '';
        } else {
            $arq = file('data/version.txt');
            $version = trim($arq[0]);
        }

        return $version;
    }
}
