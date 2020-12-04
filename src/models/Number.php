<?php namespace bpanatta\models;

/**
 * @property mixed $value
 * @property mixed $label
 */
class Number
{
    protected $value;
    protected $label;

    /**
     * @param mixed $value
     */
    public function __construct($value, $label)
    {
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Retrieves this number value.
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Retrieves this number label.
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Verify if this number value is multiple of another number.
     * @param mixed $multiple Value to validate upon
     * @return bool TRUE if this number value is multiple of the given number.
     */
    public function isMultiple($multiple)
    {
        return $this->getValue() % $multiple === 0;
    }
}
