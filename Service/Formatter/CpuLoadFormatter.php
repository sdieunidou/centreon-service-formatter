<?php

class CpuLoadFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
            '/CPU Usage : ([0-9]+) %/',
            $serviceState->getDescription(),
            $matches
        )) {
            return;
        }

        if (isset($matches[1])) {
            $serviceState->setDescription(sprintf('%s%%', $matches[1]));
            $serviceState->addMetric(
                $this->createMetric('cpu_usage', (float) $matches[1], MetricState::UNIT_PERCENT)
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'CPU_Load';
    }
}
