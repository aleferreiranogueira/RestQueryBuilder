<?php

namespace AleFerreiraNogueira\RestQueryBuilder;

class Pagination
{
    public static $order;
    public static $orderable;
    public static $relations;


    public static function set($query)
    {
        $order = explode(":", self::$order);
        // if (!in_array($order[0], ['id', 'created_at']) &&
        //     !in_array($order[0], self::$orderable) ||
        //     !in_array($order[1], ['asc', 'desc']) ||
        //     !isset($order[1])
        // ) {
        //     $order = (in_array(self::$order, self::$orderable)) ? self::$order : ['id', 'asc'];
        // }

        $query = $query->orderBy(
            $order[0],
            $order[1]
        )->with(self::$relations);

        return $query;
    }

    public static function config($columns = null, $orderBy = null, $relations = null)
    {
        self::$orderable = $columns;
        self::$order = $orderBy;
        self::$relations = $relations;
    }
}
