<?php

namespace App;

abstract class Model
{
    protected static $tableName;

    public static function insert(array $fields)
    {

        $columns = "(" . implode(',', array_map(function ($column) {
            return "$column";
        }, array_keys($fields))) . ")";
        $values = "(" . implode(',', array_map(function ($column) {
            return ":$column";
        }, array_keys($fields))) . ")";

        $query = "INSERT INTO " . static::$tableName . " " . $columns . " values " . $values;

        // return $query;
        return DB::getInstance()->insert($query, $fields);
    }

    public static function update(array $fields, ?string $condition = null, ?array $conditionParams = null)
    {
        $fieldsToUpdate = implode(",", array_map(function ($column) {
            return "$column = :$column";
        }, array_keys($fields)));

        $query = "UPDATE " . static::$tableName . " SET " . $fieldsToUpdate;
        if ($condition) {
            $query .= " WHERE  $condition";
        }
        return DB::getInstance()->update($query, [...$fields, ...$conditionParams]);
    }

    public static function delete(?string $condition = null, array $conditionParams = null)
    {
        $query = "DELETE FROM " . static::$tableName;
        if ($condition) {
            $query .= " WHERE  $condition";
        }
        return DB::getInstance()->delete($query, $conditionParams);
    }

    public static function select(?array $fields = null, ?string $condition = null, ?array $conditionParams = null)
    {
        $columns = $fields ? implode(',', $fields) : "*";

        $query = "SELECT $columns FROM " . static::$tableName;

        if ($condition) {
            $query .= " WHERE  $condition";
        }
        return DB::getInstance()->select($query, $conditionParams);
    }

}