<?php

class HTTPFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
                '/(HTTP\/[0-9.]+ [0-9]{1,3} [a-zA-Z]+) -/',
                $serviceState->getDescription(),
                $matches
            )) {
            return;
        }

        if (isset($matches[1])) {
            $serviceState->setDescription($matches[1]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'HTTP/PHP';
    }
}
