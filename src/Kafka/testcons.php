<?php

namespace App\Kafka;

use KafkaConsumer;

require_once 'KafkaConsumer.php';

$brokerList = 'kafka:9092';

$consumer = new KafkaConsumer($brokerList);
$topicName = 'test-topic007';

$consumer->consumeMessages($topicName);
