<?php

namespace AleFerreiraNogueira\RestQueryBuilder\Middleware;

use Closure;

class Filter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $filter_type = $request->input('filter_type');
        $filter_value = $request->input('filter_value');
        $filter_text = $request->input('filter_text');
        $filter = [];
        if (isset($filter_type) && isset($filter_type)) {
            foreach ($filter_type as $key => $type) {
                $array_values = explode(',', $filter_value[$key]);
                $filter['columns'][] = [
                    'type' => $type,
                    'value' =>
                        $array_values
                ];
            }
        }

        if (isset($filter_text)) {
            $filter['text'] = $filter_text;
        }

        if ($filter) {
            $request['filter'] = $filter;
        }


        return $next($request);
    }
}
