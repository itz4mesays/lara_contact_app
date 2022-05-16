<?php

namespace App\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if($companyId = request('company_id')){
            $builder->where('company_id', $companyId);
        }

        if($search = request('search')){
            $builder->where('first_name', 'LIKE',"%{$search}%");
            $builder->orWhere('last_name', 'LIKE',"%{$search}%");
            $builder->orWhere('email', 'LIKE',"%{$search}%");
        }

        return $builder;
    }
}