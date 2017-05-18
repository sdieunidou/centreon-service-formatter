<?php

class PostfixQueueFormatter extends AbstractServiceFormatter
{
    /**
     * {@inheritdoc}
     */
    public function parse(ServiceState $serviceState)
    {
        if (false === preg_match(
                '/postfix mailq is ([0-9]+) /',
                $serviceState->getDescription(),
                $matches
            )) {
            return;
        }

        if (isset($matches[1])) {
            $serviceState->setDescription(sprintf('%d mail(s) in queue', $matches[1]));
            $serviceState->addMetric(
                $this->createMetric('mail_queue', $matches[1])
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceName()
    {
        return 'Postfix_queue';
    }
}
