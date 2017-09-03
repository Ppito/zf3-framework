<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 19/08/2017
 * Time: 11:50
 */
namespace GoogleTagManager\Factory;

use GoogleTagManager\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

class Base extends \ModuleAbstract\Factory\Base implements FactoryInterface  {
    const CONFIG_NAME = Module::CONFIG_NAME;
}
