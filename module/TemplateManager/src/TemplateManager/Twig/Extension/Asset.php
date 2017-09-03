<?php
/**
 * Created by PhpStorm.
 * User: Ppito
 * Date: 2/6/2017
 * Time: 4:34 PM
 */

namespace TemplateManager\Twig\Extension;

use Zend\Json\Json;
use ZendTwig\Extension\Extension;

class Asset extends Extension {
    /** @var array */
    protected $asset = [];

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return \Twig_SimpleFunction[]|array
     */
    public function getFunctions(): array {
        return [
            new \Twig_SimpleFunction('asset', [$this, 'getAsset']),
        ];
    }

    /**
     * Returns le nom du fichier versionné
     *
     * @param string $fileName
     * @return string
     */
    public function getAsset(string $fileName): string {
        if (empty($this->asset)) {
            $config = $this->getServiceManager()->get('config');
            $configFiles = $config['zend_twig']['assets'] ?? '';

            foreach ($configFiles as $configFile) {
                $content     = file_get_contents($configFile);
                $json        = Json::decode($content, Json::TYPE_ARRAY);
                $this->asset = array_merge($this->asset, $json);
            }
        }
        return $this->asset[$fileName] ?? $fileName;
    }
}
