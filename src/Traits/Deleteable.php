<?php

namespace Lyal\Checkr\Traits;

trait Deleteable
{
    private $deletePath;

    /**
     * Deletes the given resource, returns a client instance.
     *
     * @param null $id
     *
     * @return \Lyal\Checkr\Client $client
     */
    public function delete($id = null) : \Lyal\Checkr\Client
    {
        $this->setAttribute('id', $id ?? $this->getAttribute('id'));
        $this->getClient()->request('delete', $this->getDeletePath());

        return $this->getClient();
    }

    public function getDeletePath()
    {
        return $this->deletePath ?? $this->getResourceName().'/'.$this->getAttribute('id');
    }

    public function setDeletePath($path)
    {
        $this->deletePath = $path;
    }
}
