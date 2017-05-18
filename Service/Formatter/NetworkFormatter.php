<?php

class NetworkFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
            '/In : ([0-9.]+) ([a-zA-Z\/]+) \(([0-9.]+) %\), Out : ([0-9.]+) ([a-zA-Z\/]+) \(([0-9.]+) %\)/',
            $serviceState->getDescription(),
            $matches
        )) {
            return;
        }

        if (isset($matches[6])) {
            $serviceState->setDescription(sprintf('In: %s %s (%s%%), Out: %s %s (%s%%)',
                $this->toFloat($matches[1]),
                $matches[2],
                $this->toFloat($matches[3]),
                $this->toFloat($matches[4]),
                $matches[5],
                $this->toFloat($matches[6])
            ));

            $serviceState->addMetric(
                $this->createMetric('network_in', $this->toFloat($matches[1]), MetricState::UNIT_CUSTOM, $matches[2])
            );

            $serviceState->addMetric(
                $this->createMetric('network_in_percent', $this->toFloat($matches[3]), MetricState::UNIT_PERCENT)
            );

            $serviceState->addMetric(
                $this->createMetric('network_out', $this->toFloat($matches[4]), MetricState::UNIT_CUSTOM, $matches[5])
            );

            $serviceState->addMetric(
                $this->createMetric('network_out_percent', $this->toFloat($matches[6]), MetricState::UNIT_PERCENT)
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'Network_eth0';
    }
}
