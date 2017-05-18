<?php

class LoadAverageFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
            '/([0-9]+.[0-9]+), ([0-9]+.[0-9]+), ([0-9]+.[0-9]+)/',
            $serviceState->getDescription(),
            $matches
        )) {
            return;
        }

        if (isset($matches[1]) && isset($matches[2]) && isset($matches[3])) {
            $serviceState->setDescription(sprintf('%s, %s, %s', $matches[1], $matches[2], $matches[3]));

            $serviceState->addMetric(
                $this->createMetric('load_1min', (float) $matches[1])
            );
            $serviceState->addMetric(
                $this->createMetric('load_5min', (float) $matches[2])
            );
            $serviceState->addMetric(
                $this->createMetric('load_15min', (float) $matches[3])
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'Load_average';
    }
}
