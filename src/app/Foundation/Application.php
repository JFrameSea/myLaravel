<?php

namespace App\Foundation;

use Illuminate\Foundation\Application as LaravelApplication;

class Application extends LaravelApplication
{
    protected $name = 'default';

    public function __construct($basePath = '', $name = 'defult') {
        $this->name = $name;
        $this->loadEnvironmentFrom('.env.' . $name);

        parent::__construct($basePath);
    }

    public function getName() {
        return $this->name;
    }

    /**
     * Get the path to the public / web directory.
     *
     * @return string
     */
    public function publicPath() {
        return $this->basePath . DIRECTORY_SEPARATOR . 'www-' . $this->name;
    }

    /**
     * Get the path to the application configuration files.
     *
     * @return string
     */
    public function configPath()
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'config' .
            DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * Get the path to the language files.
     *
     * @return string
     */
    public function langPath()
    {
        return $this->basePath .
            DIRECTORY_SEPARATOR . 'resources' .
            DIRECTORY_SEPARATOR . 'lang' .
            DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * Get the path to the storage directory.
     *
     * @return string
     */
    public function storagePath()
    {
        return $this->storagePath ?: $this->basePath .
            DIRECTORY_SEPARATOR . 'storage' .
            DIRECTORY_SEPARATOR . $this->name;
    }

    /**
     * Get the path to the configuration cache file.
     *
     * @return string
     */
    public function getCachedConfigPath()
    {
        return $this->basePath() . "/bootstrap/{$this->name}/cache/config.php";
    }

    /**
     * Get the path to the routes cache file.
     *
     * @return string
     */
    public function getCachedRoutesPath()
    {
        return $this->basePath() . "/bootstrap/{$this->name}/cache/routes.php";
    }

    /**
     * Get the path to the cached "compiled.php" file.
     *
     * @return string
     */
    public function getCachedCompilePath()
    {
        return $this->basePath() . "/bootstrap/{$this->name}/cache/compiled.php";
    }

    /**
     * Get the path to the cached services.json file.
     *
     * @return string
     */
    public function getCachedServicesPath()
    {
        return $this->basePath() . "/bootstrap/{$this->name}/cache/services.json";
    }
}