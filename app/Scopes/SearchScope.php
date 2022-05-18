<?php

namespace App\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SearchScope implements Scope
{
    protected $searchableColumns = ['first_name', 'last_name', 'email', 'company.name'];

    public function apply(Builder $builder, Model $model)
    {
        if($search = request()->query('search')){
            // $checkCompany = null;
            foreach ($this->searchableColumns as $column) {
                $checkCompany = explode('.', $column);

                if(count($checkCompany) == 2){
                    list($relation, $col) = $checkCompany; //assign variable as if they were arrays

                    $builder->orWhereHas($relation, function($query) use ($search, $col){
                        $query->where($col, 'LIKE', "%$search%");
                    });
                }else{
                    $builder->orWhere($column, 'LIKE',"%{$search}%");
                }
     
            }

            
        }

        return $builder;
    }
}