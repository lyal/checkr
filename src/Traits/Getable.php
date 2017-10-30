<?php

namespace Lyal\Checkr\Traits;

trait Getable
{
    private $getPath;

    /**
     * Abstract functions to imppose requirements for the exhibiting class
     */

    abstract public function getResourceName($object = null);

    abstract public function getAttributes($sanitized = true);

    abstract public function processPath($path = null, array $values = null);

    abstract public function getClient();

    abstract public function setValues($values);

    /**
     * Make a get request against the path.
     *
     * Note: options for Guzzle are set/handled on the Client
     *
     * @param string|null $path
     *
     * @return mixed
     */
    protected function getRequest($path = null, $parameters = null)
    {
        $parameters = $parameters ?? $this->getAttributes();

        if (method_exists($this, 'getEmbeddedResources')) {
            $parameters['include'] = $this->getEmbeddedResources();
        }

        if ($parameters) {
            $path .= '?' . http_build_query($parameters);
        }

        return $this->getClient()->request('get', $path);
    }

    /**
     * Load a resource via a get call.
     *
     * @param array|null $parameters
     *
     * @return $this
     */
    public function load(array $parameters = null)
    {
        $parameters = $parameters ?? ['id' => $this->getAttribute('id')];
        $path = $this->processPath($this->getLoadPath() ?? $this->getResourceName() . '/' . $this->getAttribute('id'));
        $this->setValues($this->getRequest($path, $parameters));

        return $this;
    }

    public function getLoadPath()
    {
        return $this->getPath;
    }

    public function setLoadPath($path)
    {
        $this->getPath = $path;
    }
}
