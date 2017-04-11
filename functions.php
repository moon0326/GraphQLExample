<?php

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class Dumper
{
    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public function dump($value)
    {
        if (class_exists(CliDumper::class)) {
            $dumper = 'cli' === PHP_SAPI ? new CliDumper : new HtmlDumper;

            $dumper->dump((new VarCloner)->cloneVar($value));
        } else {
            var_dump($value);
        }
    }
}

function partitionArray($items, $perPage) {
    $listLength = count($items);
    if ($perPage > $listLength) {
        return [$items];
    }
    $partitionLength = floor($listLength / $perPage);
    $partrem = $listLength % $perPage;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $perPage; $px++) {
        $incr = ($px < $partrem) ? $partitionLength + 1 : $partitionLength;
        $partition[$px] = array_slice( $items, $mark, $incr );
        $mark += $incr;
    }

    return $partition;
}

/**
 * Parses username:password@host format
 * @param $host
 * @return array
 */
function parseCouchbaseDsn($host)
{
    $pattern = '/(.+):(.+)@(.+):([0-9]+)$/';
    preg_match_all($pattern, $host, $matches, PREG_SET_ORDER);

    if (count($matches[0]) !== 5) {
        throw new \InvalidArgumentException("Invalid DSN. Format must be username:password@ip:adminPort");
    }

    $matches = $matches[0];

    return [
        'username' => $matches[1],
        'password' => $matches[2],
        'host' => $matches[3],
        'port' => $matches[4]
    ];
}

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());

        die(1);
    }
}

function env($key, $default = null)
{
    $value = getenv($key);

    if ($value === false) {
        return value($default);
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;

        case 'empty':
        case '(empty)':
            return '';

        case 'null':
        case '(null)':
            return;
    }

    return $value;
}

/**
 * Return the default value of the given value.
 *
 * @param  mixed  $value
 * @return mixed
 */
function value($value)
{
    return $value instanceof Closure ? $value() : $value;
}