<?php

class ServiceFormatter
{
    /**
     * @var array
     */
    private $parsers;

    /**
     * ServiceParser constructor.
     */
    public function __construct()
    {
        $this->parsers = [];
    }

    /**
     * @param ServiceFormatterInterface $serviceParser
     */
    public function addParser(ServiceFormatterInterface $serviceParser)
    {
        $this->parsers[] = $serviceParser;
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $status
     *
     * @return ServiceState
     */
    public function parse($name, $description, $status)
    {
        $state = $this->createServiceState($name, $description, $status);

        foreach ($this->parsers as $parser) {
            if ($parser->support($state) || $parser->supportPrefix($state)) {
                $parser->parse($state);
            }
        }

        return $state;
    }

    /**
     * @param string $name
     * @param string $description
     * @param string $status
     *
     * @return ServiceState
     */
    private function createServiceState($name, $description, $status)
    {
        $state = new ServiceState();
        $state->setName($name);
        $state->setDescription($description);
        $state->setRawDescription($description);
        $state->setStatus($status);

        return $state;
    }
}
