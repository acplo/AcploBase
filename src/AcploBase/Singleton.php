<?php
/**
 * Singleton trait
 *
 * @package   AcploBase
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
namespace AcploBase;

/**
 * @codeCoverageIgnore
 */
trait Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
