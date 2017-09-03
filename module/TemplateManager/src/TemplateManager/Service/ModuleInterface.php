<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 2/3/17
 * Time: 5:19 PM
 */

namespace TemplateManager\Service;

interface ModuleInterface {

    /**
     * Prepare module before render
     *
     * @param array $params
     */
    public function configure(array $params = []): void;

    /**
     * Render module
     *
     * @return string
     */
    public function render(): string;
}