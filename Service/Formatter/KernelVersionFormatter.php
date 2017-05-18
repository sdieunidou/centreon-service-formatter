<?php

class KernelVersionFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        $formatted = str_replace('Kernel version : ', '', $serviceState->getDescription());

        $serviceState->setDescription($formatted);
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'Kernel_version';
    }
}
