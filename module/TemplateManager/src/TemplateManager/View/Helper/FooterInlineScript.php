<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 8/18/17
 * Time: 2:52 PM
 */

namespace TemplateManager\View\Helper;

use Zend\View\Helper\InlineScript;

/**
 * Helper for setting and retrieving script elements for inclusion in HTML body
 * section
 */
class FooterInlineScript extends InlineScript
{
    /**
     * Registry key for placeholder
     *
     * @var string
     */
    protected $regKey = 'Zend_View_Helper_FooterInlineScript';
}
