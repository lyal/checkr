<?php

namespace Lyal\Checkr\Traits;

use Lyal\Checkr\Exceptions\IdMissing;

trait Saveable
{
    protected $savePath;

    /**
     * Save an object.
     *
     * @throws \Lyal\Checkr\Exceptions\IdMissing
     *
     * @return $this
     */
    public function save()
    {
        if ($this->getAttribute('id') === null) {
            throw new IdMissing($this);
        }
        $path = $this->getSavePath() ?? $this->getResourceName().'/'.$this->getAttribute('id');
        $this->setValues($this->postRequest($path));

        return $this;
    }

    /**
     * Get the save path of the current object.
     *
     * @return string
     */
    public function getSavePath()
    {
        return $this->savePath;
    }

    /**
     * Set the save path of the current object.
     *
     * @param $path
     *
     * @return mixed
     */
    public function setSavePath($path)
    {
        return $this->savePath = $path;
    }
}
