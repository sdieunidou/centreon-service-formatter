<?php

interface ServiceFormatterInterface
{
    /**
     * @param ServiceState $serviceState
     *
     * @return bool
     */
    public function support(ServiceState $serviceState);

    /**
     * @param ServiceState $serviceState
     *
     * @return bool
     */
    public function supportPrefix(ServiceState $serviceState);

    /**
     * @param ServiceState $serviceState
     */
    public function parse(ServiceState $serviceState);
}
