<?php

namespace Lyal\Checkr\Traits;

trait Postable
{

    /**
     * Abstract functions to imppose requirements for the exhibiting class
     */

    abstract public function getResourceName($object = null);

    abstract public function getAttributes($sanitized = true);

    abstract public function processPath($path = null, array $values = null);

    abstract public function getClient();

    abstract public function setValues($values);

    public function postRequest($path, array $options = [])
    {
        $options['form_params'] = $this->getAttributes();

        return $this->getClient()->request('post', $path, $options);
    }
}
