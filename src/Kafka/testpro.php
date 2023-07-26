<?php

namespace App\Kafka;

use KafkaProducer;

require_once 'KafkaProducer.php';

$brokerList = 'kafka:9092';

$producer = new KafkaProducer($brokerList);
$topicName = 'test-topic007';
$payload = 'Hello, Kafka!';
$key = 'message_key_1';

$producer->produceMessage($topicName, $payload, $key);

echo 'Message sent successfully: ' . $payload . PHP_EOL;
