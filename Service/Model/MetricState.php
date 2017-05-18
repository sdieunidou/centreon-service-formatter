<?php

class MetricState
{
    const UNIT_NUMBER = 'number';
    const UNIT_PERCENT = 'percent';
    const UNIT_CUSTOM = 'custom';

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var string
     */
    private $unit;

    /**
     * @var string
     */
    private $unitCustomValue;

    /**
     * MetricState constructor.
     */
    public function __construct()
    {
        $this->unit = self::UNIT_NUMBER;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return MetricState
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return MetricState
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     *
     * @return MetricState
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnitCustomValue()
    {
        return $this->unitCustomValue;
    }

    /**
     * @param string $unitCustomValue
     *
     * @return MetricState
     */
    public function setUnitCustomValue($unitCustomValue)
    {
        $this->unitCustomValue = $unitCustomValue;

        return $this;
    }
}
