<?php

class ServiceState
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rawDescription;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $status;

    /**
     * @var MetricState[]
     */
    private $metrics;

    /**
     * ServiceState constructor.
     */
    public function __construct()
    {
        $this->metrics = [];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ServiceState
     */
    public function setName($name)
    {
        $this->name = trim($name);

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return ServiceState
     */
    public function setDescription($description)
    {
        $this->description = trim($description);

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return ServiceState
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getRawDescription()
    {
        return $this->rawDescription;
    }

    /**
     * @param string $rawDescription
     *
     * @return ServiceState
     */
    public function setRawDescription($rawDescription)
    {
        $this->rawDescription = $rawDescription;

        return $this;
    }

    /**
     * @return MetricState[]
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param MetricState $metric
     *
     * @return $this
     */
    public function addMetric(MetricState $metric)
    {
        $this->metrics[] = $metric;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('[%s][%s] %s',
            $this->getName(),
            ServiceStatus::getStatusLabel($this->getStatus()),
            $this->getDescription()
        );
    }
}
