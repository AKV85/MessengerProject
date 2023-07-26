<?php

use RdKafka\Conf;
use RdKafka\Producer;

$conf = new Conf();
$conf->set('metadata.broker.list', 'kafka:9092');

$producer = new Producer($conf);
$topic = $producer->newTopic('test-topic007');
$payload = 'Hello, Kafka!';
$key = 'message_key_1'; 

$topic->produce(RD_KAFKA_PARTITION_UA, 0, $payload, $key);

while ($producer->getOutQLen() > 0) {
    $producer->poll(50);
}

echo 'Message sent successfully: ' . $payload . PHP_EOL;