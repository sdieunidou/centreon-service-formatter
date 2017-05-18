<?php

require_once __DIR__.'/Extra/ServicesData.php';
require_once __DIR__.'/Service/Formatter/ServiceFormatterInterface.php';
require_once __DIR__.'/Service/Formatter/AbstractServiceFormatter.php';
require_once __DIR__.'/Service/Formatter/CpuLoadFormatter.php';
require_once __DIR__.'/Service/Formatter/CpuModelFormatter.php';
require_once __DIR__.'/Service/Formatter/KernelVersionFormatter.php';
require_once __DIR__.'/Service/Formatter/PostfixQueueFormatter.php';
require_once __DIR__.'/Service/Formatter/DiskIOFormatter.php';
require_once __DIR__.'/Service/Formatter/HTTPFormatter.php';
require_once __DIR__.'/Service/Formatter/LoadAverageFormatter.php';
require_once __DIR__.'/Service/Formatter/NetworkFormatter.php';
require_once __DIR__.'/Service/Formatter/PingFormatter.php';
require_once __DIR__.'/Service/Formatter/MemoryFormatter.php';
require_once __DIR__.'/Service/ServiceFormatter.php';
require_once __DIR__.'/Service/ServiceStatus.php';
require_once __DIR__.'/Service/Model/ServiceState.php';
require_once __DIR__.'/Service/Model/MetricState.php';

$parser = new ServiceFormatter();
$parser->addParser(new CpuLoadFormatter());
$parser->addParser(new CpuModelFormatter());
$parser->addParser(new DiskIOFormatter());
$parser->addParser(new KernelVersionFormatter());
$parser->addParser(new HTTPFormatter());
$parser->addParser(new PostfixQueueFormatter());
$parser->addParser(new LoadAverageFormatter());
$parser->addParser(new PingFormatter());
$parser->addParser(new NetworkFormatter());
$parser->addParser(new MemoryFormatter());

foreach (ServicesData::getServicesData() as $service) {
    $state = $parser->parse($service['name'], $service['desc'], $service['status']);
    if (empty($state)) {
        throw new Exception(sprintf("cant parser service with name '%s'", $service['name']));
    }

    echo $state."\n";

    /** @var ServiceState $state */
    foreach ($state->getMetrics() as $metric) {
        echo sprintf("    [%s] %s %s\n",
            $metric->getName(),
            $metric->getValue(),
            $metric->getUnitCustomValue() ? $metric->getUnitCustomValue() : $metric->getUnit()
        );
    }

    echo "\n";
}
