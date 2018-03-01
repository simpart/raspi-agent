<?php
namespace ttr\iotgw\chk\ip;

require_once(__DIR__ . '/../../cnf/ipaddr.php');

try {
    global $g_getaddr;
    
    if (2 !== count($argv)) {
        throw new \Exception('invalid parameter');
    }
    $g_getaddr = \ttr\iotgw\cnf\getIpaddr($argv[1]);
    require(__DIR__ . '/event.php');

} catch (\Exception $e) {
    echo $e->getMessage();
}
