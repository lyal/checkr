<?php

namespace Lyal\Checkr\Traits;

trait Postable
{
    public function postRequest($path, array $options = [])
    {
        $options['form_params'] = $this->getAttributes();

        return $this->getClient()->request('post', $path, $options);
    }
}
