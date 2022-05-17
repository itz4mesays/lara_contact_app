<?php

namespace App\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if(request('company_id')){
            if($companyId = request('company_id')){
                $builder->where('company_id', $companyId);
            }
    
            return $builder;
        }

        
        
    }
}