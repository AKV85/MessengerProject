<?php

use RdKafka\Conf;
use RdKafka\Consumer;

require_once '../../vendor/autoload.php';

class KafkaConsumer
{
    private Consumer $consumer;

    public function __construct(string $brokerList)
    {
        $conf = new Conf();
        $conf->set('metadata.broker.list', $brokerList);

        $this->consumer = new Consumer($conf);
    }

    public function consumeMessages(string $topicName)
    {
        $topic = $this->consumer->newTopic($topicName);
        $topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

        while (true) {
            $message = $topic->consume(0, 1000);
            if ($message === null) {
                continue;
            }

            if (RD_KAFKA_RESP_ERR_NO_ERROR === $message->err) {
                var_dump($message->payload);
                var_dump($message->key);
            }
        }

        $topic->consumeStop(0);
    }
}
