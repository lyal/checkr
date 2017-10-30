<?php

namespace Lyal\Checkr\Traits;

use Lyal\Checkr\Exceptions\ResourceNotCreated;

trait Creatable
{


    /**
     * Abstract functions to imppose requirements for the exhibiting class
     */

    abstract public function getResourceName($object = null);

    abstract public function getAttributes($sanitized = true);

    abstract public function processPath($path = null, array $values = null);

    abstract public function postRequest($path, array $options = []);

    abstract public function getClient();

    abstract public function setValues($values);

    abstract public function setAttributes(array $values);

    protected $createPath;

    /**
     * Post a resource and update this parameters with the response from the API.
     *
     * @throws ResourceNotCreated
     *
     * @return $this
     */
    public function create()
    {
        $path = $this->getCreatePath() ?? $this->getResourceName();

        $response = $this->postRequest($path);
        $this->setAttributes([]);
        $this->setValues($response);
        if ($this->getClient()->getLastResponse()->getStatusCode() !== 201) {
            throw new ResourceNotCreated($this->getClient()->getLastResponse()->getBody());
        }

        return $this;
    }

    /**
     * Get the create path of the current object.
     *
     * @return string
     */
    public function getCreatePath()
    {
        return $this->createPath;
    }

    /**
     * Set the save path of the current object.
     *
     * @param $path
     *
     * @return mixed
     */
    public function setCreatePath($path)
    {
        return $this->createPath = $path;
    }
}
