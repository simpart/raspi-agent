<?php
/**
 * @file   ipaddr.php
 * @brief  util functions for ip address
 * @author simpart
 */
namespace ttr\iotgw\cnf;

function getIpaddr($ifn) {
    try {
        $ifc = explode(PHP_EOL, shell_exec('ifconfig'));
	$hit = false;
	$ret = null;
        foreach ($ifc as $line) {
            if (true === $hit) {
                if (false !== strpos($line, 'inet')) {
                    $ret = explode(' ', $line);
                    break;
                }
            }
            if (0 === strpos($line, $ifn)) {
                $hit = true;
                continue;
	    }
	}
        /* check find */
        if (null === $ret) {
            return null;
	}
        foreach ($ret as $ridx => $rval) {
	    if (0 === strcmp($rval, 'inet')) {
	        return $ret[$ridx+1];
	    }
	}
	return null;
    } catch (Exception $e) {
        throw new \Exception(
            PHP_EOL .
            'File:' . __FILE__     . ',' .
            'Line:' . __line__     . ',' .
            'Func:' . __FUNCTION__ . ',' .
            $e->getMessage()
        );
    }
}
