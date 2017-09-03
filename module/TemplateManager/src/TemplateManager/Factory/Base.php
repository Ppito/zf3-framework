<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 11/15/2016
 * Time: 8:26 PM
 *
 * @link      https://github.com/Ppito/zf3-whoops for the canonical source repository
 * @copyright Copyright (c) 2016 Mickael TONNELIER.
 * @license   https://github.com/Ppito/zf3-whoops/blob/master/LICENSE.md The MIT License
 */

namespace TemplateManager\Factory;

use TemplateManager\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

class Base extends \ModuleAbstract\Factory\Base implements FactoryInterface  {
    const CONFIG_NAME = Module::CONFIG_NAME;
}