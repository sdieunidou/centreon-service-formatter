<?php

class CpuModelFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        $formatted = str_replace('CPU Model : ', '', $serviceState->getDescription());

        $serviceState->setDescription($formatted);
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'CPU_Model';
    }
}
