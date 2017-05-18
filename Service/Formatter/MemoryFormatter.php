<?php

class MemoryFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        $types = [
            'RAM', 'SWAP', 'Cached', 'Buffer',
        ];

        foreach ($types as $type) {
            if (false !== preg_match('/'.$type.'=([0-9]+)% \(([0-9]+)([A-Z])(\/)?([0-9]+)?([A-Z])?\)/', $serviceState->getDescription(), $matches)) {
                if (isset($matches[3])) {
                    $serviceState->addMetric(
                        $this->createMetric(sprintf('%s', $type), $this->toFloat($matches[1]), MetricState::UNIT_PERCENT)
                    );

                    $serviceState->addMetric(
                        $this->createMetric(sprintf('%s_current', $type), $this->toFloat($matches[2]), MetricState::UNIT_CUSTOM, $matches[3])
                    );
                }

                if (isset($matches[5]) && isset($matches[6])) {
                    $serviceState->addMetric(
                        $this->createMetric(sprintf('%s_max', $type), $this->toFloat($matches[5]), MetricState::UNIT_CUSTOM, $matches[6])
                    );
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'Memory';
    }
}
