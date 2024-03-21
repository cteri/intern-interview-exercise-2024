<?php

namespace App\Http\Traits;

trait Helper
{
    public function hashKey(array $request, array $columns)
    {
        $parameters = array_merge($request, $columns);

        return hash('sha256', json_encode($parameters));
    }
}
