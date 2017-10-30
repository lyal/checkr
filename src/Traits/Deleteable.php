<?php

namespace Lyal\Checkr\Traits;

trait Deleteable
{
    private $deletePath;


    /**
     * Abstract functions to imppose requirements for the exhibiting class
     */

    abstract public function getResourceName($object = null);

    abstract public function getAttributes($sanitized = true);

    abstract public function processPath($path = null, array $values = null);

    abstract public function postRequest($path, array $options = []);

    abstract public function getClient();

    abstract public function setValues($values);

    /**
     * Deletes the given resource, returns a client instance.
     *
     * @param string|null $id
     *
     * @return \Lyal\Checkr\Client $client
     */
    public function delete($id = null)
    {
        $this->setAttribute('id', $id ?? $this->getAttribute('id'));
        $this->getClient()->request('delete', $this->getDeletePath());

        return $this->getClient();
    }

    public function getDeletePath()
    {
        return $this->deletePath ?? $this->getResourceName() . '/' . $this->getAttribute('id');
    }

    public function setDeletePath($path)
    {
        $this->deletePath = $path;
    }
}
