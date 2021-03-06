--TEST--
Wrong return values for binary protocol
--SKIPIF--
<?php if (!extension_loaded("memcached")) print "skip"; ?>
--FILE--
<?php
$client = new Memcached();
$client->addServer ('127.0.0.1', 11211);
$client->setOption(Memcached::OPT_BINARY_PROTOCOL, true);

$client->set('key1', 'value1');
echo "set result code: ".$client->getResultCode()."\n";

$value = $client->get('key1');
echo "got $value with result code: ".$client->getResultCode()."\n";

$client->add('key2', 'value2');
echo "add result code: ".$client->getResultCode()."\n";

echo "OK\n";

?>
--EXPECT--
set result code: 0
got value1 with result code: 0
add result code: 0
OK