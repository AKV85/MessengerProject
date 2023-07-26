<?php

use RdKafka\Conf;
use RdKafka\Producer;

require_once '../../vendor/autoload.php';

class KafkaProducer
{
    private Producer $producer;

    public function __construct(string $brokerList)
    {
        $conf = new Conf();
        $conf->set('metadata.broker.list', $brokerList);

        $this->producer = new Producer($conf);
    }

    public function produceMessage(string $topicName, string $payload, string $key = null): void
    {
        $topic = $this->producer->newTopic($topicName);
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $payload, $key);

        while ($this->producer->getOutQLen() > 0) {
            $this->producer->poll(50);
        }
    }


}
