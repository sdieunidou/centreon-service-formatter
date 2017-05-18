<?php

class DiskIOFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
                '/Write ([0-9]+) ([a-zA-Z]+\/[a-zA-Z])/',
                $serviceState->getDescription(),
                $matches
            )) {
            return;
        }

        if (isset($matches[1])) {
            $serviceState->setDescription(sprintf('%s %s', $matches[1], $matches[2]));
            $serviceState->addMetric(
                $this->createMetric('disk_write', (float) $matches[1], MetricState::UNIT_CUSTOM, $matches[2])
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServicePrefixName()
    {
        return 'Disk_IO_';
    }
}
