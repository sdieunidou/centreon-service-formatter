<?php

abstract class AbstractServiceFormatter implements ServiceFormatterInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getServicePrefixName()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function support(ServiceState $serviceState)
    {
        return $this->getServiceName() === $serviceState->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function supportPrefix(ServiceState $serviceState)
    {
        if (!$this->getServicePrefixName()) {
            return;
        }

        return mb_strpos($serviceState->getName(), $this->getServicePrefixName()) === 0;
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @param string $unit
     *
     * @return MetricState
     */
    public function createMetric($name, $value, $unit = MetricState::UNIT_NUMBER, $unitCustomValue = null)
    {
        $metric = (new MetricState())
            ->setName($name)
            ->setValue($value)
            ->setUnit($unit);

        if ($unit === MetricState::UNIT_CUSTOM) {
            $metric
                ->setUnitCustomValue($unitCustomValue);
        }

        return $metric;
    }

    protected function toFloat($value)
    {
        return (float) str_replace(',', '.', $value);
    }
}
