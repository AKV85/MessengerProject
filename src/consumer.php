<?php

use RdKafka\Conf;
use RdKafka\Consumer;

$conf = new Conf();
$conf->set('metadata.broker.list', 'kafka:9092');
$topicName = 'test-topic007';

$consumer = new Consumer($conf);
$topic = $consumer->newTopic($topicName);

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