<?php
/**
 * Created by PhpStorm.
 * User: charlie
 * Date: 2018/4/8
 * Time: 下午3:36
 */

namespace singer\library;


use yii\db\Exception;

class ConfigParse
{
    public static function parseSql($sid, $column = '')
    {
        $pos = strrpos($sid, '.');
        if (false === $pos) {
            throw new Exception('no such sql id');
        }
        $filePath = SQL_MAP.str_replace('.', '/', substr($sid, 0, $pos));

        $sqlMap = require $filePath.'.php';

        $key = substr($sid, $pos);
        $sql = $sqlMap[$key];

        return $column ? str_replace('#COLUMN#', $column, $sql) : $sql;
    }

    public static function parseCache($configKey, $key)
    {
        $pos = strrpos($configKey, '.');
        if (false === $pos) {
            throw new Exception('no such cache id');
        }

        $filePath = CACHE.str_replace('.', '/', substr($configKey, 0, $pos));

        $cacheConf = require $filePath.'.php';

        $processKey = $cacheConf[substr($configKey, $pos+1)];

        $processKey['key'] = sprintf($processKey['key'], $key);

        return $processKey;
    }
}