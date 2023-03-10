<?php
declare(strict_types=1);

/**
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Database\Query;
use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
use DebugKit\DebugSql;

$hasDebugKitConfig = ConnectionManager::getConfig('debug_kit');
if (!$hasDebugKitConfig && !in_array('sqlite', PDO::getAvailableDrivers())) {
    $msg = 'DebugKit not enabled. You need to either install pdo_sqlite, ' .
        'or define the "debug_kit" connection name.';
    Log::warning($msg);

    return;
}

if (!$hasDebugKitConfig) {
    ConnectionManager::setConfig('debug_kit', [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Sqlite',
        'database' => TMP . 'debug_kit.sqlite',
        'encoding' => 'utf8',
        'cacheMetadata' => true,
        'quoteIdentifiers' => false,
    ]);
}

if (!function_exists('sql')) {
    /**
     * Prints out the SQL statements generated by a Query object.
     *
     * This function returns the same variable that was passed.
     * Only runs if debug mode is enabled.
     *
     * @param \Cake\Database\Query $query Query to show SQL statements for.
     * @param bool $showValues Renders the SQL statement with bound variables.
     * @param bool|null $showHtml If set to true, the method prints the debug
     *    data in a browser-friendly way.
     * @return \Cake\Database\Query
     */
    function sql(Query $query, $showValues = true, $showHtml = null)
    {
        return DebugSql::sql($query, $showValues, $showHtml, 1);
    }
}

if (!function_exists('sqld')) {
    /**
     * Prints out the SQL statements generated by a Query object and dies.
     *
     * Only runs if debug mode is enabled.
     * It will otherwise just continue code execution and ignore this function.
     *
     * @param \Cake\Database\Query $query Query to show SQL statements for.
     * @param bool $showValues Renders the SQL statement with bound variables.
     * @param bool|null $showHtml If set to true, the method prints the debug
     *    data in a browser-friendly way.
     * @return void
     */
    function sqld(Query $query, $showValues = true, $showHtml = null)
    {
        DebugSql::sqld($query, $showValues, $showHtml, 2);
    }
}
