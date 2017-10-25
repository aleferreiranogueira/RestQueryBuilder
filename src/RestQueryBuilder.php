<?php

namespace AleFerreiraNogueira\RestQueryBuilder;

use AleFerreiraNogueira\RestQueryBuilder\Filter;
use AleFerreiraNogueira\RestQueryBuilder\Pagination;
use Illuminate\Http\Request;

class RestQueryBuilder
{
    protected $model;
    protected $orderBy;
    protected $orderable;
    protected $relations;
    protected $isPaginated;

    protected $query;

    public $size;

    public function config(array $params, Request $request)
    {
        $this->query = (method_exists($params['model'], 'query'))? $params['model']::query() : $params['model'];
        $this->model = $params['model'];
        $this->orderable = $params['orderable'];
        $this->relations = (isset($params['relations'])) ? $params['relations'] : [];
        $this->orderBy = $request->input('order', $params['defaultOrder']);
        $this->size  = ($request->input('size', 12) < 1) ? 1 : $request->input('size');
        $this->filter = $request->input('filter', null);
        $this->paginate = $request->input('paginate', 0);

        return $this;
    }

    public function isPaginated()
    {
        return $this->isPaginated;
    }

    public function paginate($size)
    {
        $this->isPaginated = true;
        $this->size = $size;
        Pagination::config($this->orderable, $this->orderBy, $this->relations);
        $this->query = Pagination::set($this->query);
        return $this;
    }

    public function filter($filter)
    {
        Filter::config($filter);

        $this->query = Filter::set($this->query);

        return $this;
    }

    public function build()
    {
        if ($this->paginate) {
            $this->paginate($this->size);
        } else {
            $this->query->with($this->relations);
        }

        if ($this->filter) {
            $this->filter($this->filter);
        }

        return $this->query;
    }
}
