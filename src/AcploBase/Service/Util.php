<?php

/**
 * Define alguns serviços úteis
 *
 * @package   AcploBase\Service
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
namespace AcploBase\Service;

use Zend\Console\Console;

/**
 * Define alguns serviços úteis
 *
 * @package   AcploBase\Service
 * @author    Abel Lopes <abel@abellpes.eti.br>
 * @link      http://www.abellpes.eti.br Development Blog
 * @link      http://github.com/LansoWeb/AcploBase for the canonical source repository
 * @copyright Copyright (c) 2015-2020 Abel Lopes (http://www.abellpes.eti.br)
 * @license   http://www.abellpes.eti.br/licenca-bsd New BSD license
 */
class Util
{
    public static function getUserAgent()
    {
        if (Console::isConsole()) {
            return 'Console';
        }
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            return $_SERVER['HTTP_USER_AGENT'];
        }

        return '???';
    }

    public static function getIP($just_remote = true)
    {
        if (Console::isConsole()) {
            return '127.0.0.1';
        }

        // O único realmente seguro de se confiar é o REMOTE_ADDR
        $validator = new \Zend\Validator\Ip();

        $remote = $_SERVER['REMOTE_ADDR'];
        if (!$validator->isValid($remote)) {
            throw new \RuntimeException("Endereço de IP '$remote' inválido");
        }
        if ($just_remote) {
            return $remote;
        }

        $ips = [$remote];

        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
            if ($validator->isValid($ip)) {
                $ips[2] = $ip;
            }
        } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if ($validator->isValid($ip)) {
                $ips[1] = $ip;
            }
        }

        return $ips;
    }
}
