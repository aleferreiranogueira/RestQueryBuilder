<?php

namespace AleFerreiraNogueira\RestQueryBuilder;

class Filter
{
    protected static $filter;

    public static function set($query)
    {
        if (isset(self::$filter['columns'])) {
            foreach (self::$filter['columns'] as $key => $value) {
                $query = $query->whereIn($value['type'], $value['value']);
            }
        }
        if (isset(self::$filter['text'])) {
            $query = $query->where('name', 'LIKE', '%' . self::$filter['text'] . '%');
        }
        return $query;
    }

    public static function config($filter)
    {
        self::$filter = $filter;
    }
}
