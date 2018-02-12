<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class IntegrationInfo
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class IntegrationInfo
{
    /** @var string */
    private $webshopPlugin;

    /** @var string */
    private $webshopPluginVersion;

    /** @var string */
    private $integratorName;

    /** @var string */
    private $programmingLanguage;

    /** @var string */
    private $operatingSystem;

    /** @var string */
    private $operatingSystemVersion;

    /** @var string */
    private $ddpXsdVersion = '1.3.5';


    public function __construct($webshopPlugin, $webshopPluginVersion)
    {
        $this->webshopPlugin = $webshopPlugin;
        $this->webshopPluginVersion = $webshopPluginVersion;
        $this->integratorName = 'CMP DDP PHP SDK';
        $this->programmingLanguage = 'PHP/' . PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION;
        $this->operatingSystem = PHP_OS;
        $parts = explode(' ', php_uname());
        $this->operatingSystemVersion = (!empty($parts[3]) ? $parts[3] : null) . (!empty($parts[2]) ? $parts[2] : null);
    }

    /**
     * @return string
     */
    public function getWebshopPlugin()
    {
        return $this->webshopPlugin;
    }

    /**
     * @return string
     */
    public function getWebshopPluginVersion()
    {
        return $this->webshopPluginVersion;
    }

    /**
     * @return string
     */
    public function getIntegratorName()
    {
        return $this->integratorName;
    }

    /**
     * @return string
     */
    public function getProgrammingLanguage()
    {
        return $this->programmingLanguage;
    }

    /**
     * @return string
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * @return string
     */
    public function getOperatingSystemVersion()
    {
        return $this->operatingSystemVersion;
    }

    /**
     * @return string
     */
    public function getDdpXsdVersion()
    {
        return $this->ddpXsdVersion;
    }
}