<?php

class PingFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
            '/rta ([0-9]+,[0-9]+)([a-zA-Z]+), lost ([0-9]+)%/',
            $serviceState->getDescription(),
            $matches
        )) {
            return;
        }

        if (isset($matches[1]) && isset($matches[2]) && isset($matches[3])) {
            $serviceState->setDescription(sprintf('%s %s, lost %s%%', $this->toFloat($matches[1]), $this->toFloat($matches[2]), $matches[3]));

            $serviceState->addMetric(
                $this->createMetric('ping_time', $this->toFloat($matches[1]), MetricState::UNIT_CUSTOM, $matches[2])
            );

            $serviceState->addMetric(
                $this->createMetric('ping_lost', $this->toFloat($matches[3]))
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'Ping';
    }
}
