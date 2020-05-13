<?php

namespace Lyal\Checkr\Traits;

use Illuminate\Support\Str;

trait HasAttributes
{
    abstract public function getFields();

    /**
     * The entity's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Results to not send with API requests.
     *
     * @var array
     */
    protected $hidden = [];

    public $checkFields = false;

    /**
     * @param $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if ($this->checkField($key) && array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key] ?? null;
        }
    }

    /**
     * Set a value in our container, checking to make sure it's
     * a valid attribute.
     *
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * Check if a value is set in our container;.
     *
     * @param $key
     *
     * @return bool
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
     * returns true if $this->checkFields = false.
     *
     * @param $field
     *
     * @return bool
     */
    public function checkField($field): bool
    {
        if (!$this->checkFields) {
            return true;
        }

        return
            $field === 'include'
            || in_array(Str::singular($field).'_id', $this->getFields(), false)
            || in_array(Str::singular($field).'_ids', $this->getFields(), false)
            || in_array($field, $this->getFields(), false)
            || in_array($field, $this->getHidden(), false);
    }

    /**
     * @param bool $sanitized Remove hidden fields if true
     *
     * @return array
     */
    public function getAttributes($sanitized = true)
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
     * Sets the attribute values to the contents of the given array.
     *
     * Note: this is not API-safe, as it ignores the $fields array
     *
     * @param array $values
     *
     * @return array
     */
    protected function setAttributes(array $values)
    {
        return $this->attributes = $values;
    }

    /**
     * Getter for our attribute container.
     *
     * @param $key
     *
     * @return mixed|null
     */
    protected function getAttribute($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }
    }

    /**
     * Setter for our attribute container.
     *
     * @param $key
     * @param
     *
     * @return mixed|null
     */
    protected function setAttribute($key, $value)
    {
        return $this->attributes[$key] = $value;
    }

    /**
     * Get the hidden attributes array that should not be sent in requests.
     *
     * @return array
     */
    protected function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set a hidden attributes array.
     *
     * @param array $hidden
     *
     * @return mixed
     */
    protected function setHidden(array $hidden)
    {
        return $this->hidden = $hidden;
    }
}
