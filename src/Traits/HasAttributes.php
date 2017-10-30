<?php


namespace Lyal\Checkr\Traits;

use Lyal\Checkr\Exceptions\InvalidAttributeException;

trait HasAttributes
{
    /**
     * The entity's attributes.
     * @var array
     */
    protected $attributes = [];

    /**
     * Results to not send with API requests
     *
     * @var array
     */

    protected $hidden = [];

    public $checkFields = true;


    /**
     * @param $key
     * @return \Illuminate\Support\Collection|mixed|null
     * @throws InvalidAttributeException
     */
    public function __get($key)
    {
        if ($this->checkField($key) && array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key] ?? null;
        }
        throw new InvalidAttributeException(get_class($this), $key);
    }

    /**
     * Set a value in our container, checking to make sure it's
     * a valid attribute
     *
     * @param $key
     * @param $value
     * @throws InvalidAttributeException
     */


    public function __set($key, $value)
    {
        if (!$this->checkField($key)) {
            throw new InvalidAttributeException(get_class($this), $key);
        }

        $this->attributes[$key] = $value;
    }

    /**
     * Check if a value is set in our container;
     *
     * @param $key
     * @throws InvalidAttributeException
     *
     * @return boolean
     */

    public function __isset($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return null !== $this->attributes[$key];
        }
        return false;
    }

    /**
     * Checks if a field is valid for an entity - check always
     * returns true if $this->checkFields = false
     *
     * @param $field
     * @return bool
     */

    public function checkField($field) : bool
    {
        if ($field === 'include') {
            return true;
        }

        if ($this->checkFields) {
            return
                in_array(str_singular($field) . '_id', $this->getFields(), false)
                || in_array(str_singular($field) . '_ids', $this->getFields(), false)
                || in_array($field, $this->getFields(), false)
                || in_array($field, $this->getHidden(), false);
        }
        return true;
    }

    /**
     * @param bool $sanitized Remove hidden fields if true
     * @return array
     */

    public function getAttributes($sanitized = true) : array
    {
        $container = $this->attributes;
        if ($sanitized) {
            foreach ($this->getHidden() as $key) {
                unset($container[$key]);
            }
        }
        return $container;
    }

    /**
     * Sets the attribute values to the contents of the given array
     *
     * Note: this is not API-safe, as it ignores the $fields array
     *
     * @param array $values
     * @return array
     */
    protected function setAttributes(array $values) : array
    {
        return $this->attributes = $values;
    }


    /**
     * Getter for our attribute container
     *
     * @param $key
     * @return mixed|null
     */

    protected function getAttribute($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }
        return null;
    }

    /**
     * Setter for our attribute container
     *
     * @param $key
     * @param
     * @return mixed|null
     */

    protected function setAttribute($key, $value)
    {
        return $this->attributes[$key] = $value;
    }

    /**
     * Get the hidden attributes array that should not be sent in requests
     *
     * @return array
     */

    protected function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set a hidden attributes array
     *
     * @param $key
     * @param $name
     * @return mixed
     */

    protected function setHidden($hidden)
    {
        return $this->hidden = $hidden;
    }

}