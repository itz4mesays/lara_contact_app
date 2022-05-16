<?php

namespace App\Models;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table= 'contacts';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];


    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SearchScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getAllContacts()
    {
        return self::latest()->with('company')->paginate(10);
    }

    public function singleContact($id)
    {
        return self::findOrFail($id);
    }

    public function scopeLatestRec($query)
    {
        return $query->orderBy('created_at', 'desc');
    }


    // public function scopeFilterContact($query)
    // {
    //     if($companyId = request('company_id')){
    //         $query->where('company_id', $companyId);
    //     }

    //     if($search = request('search')){
    //         $query->where('first_name', 'LIKE',"%{$search}%");
    //     }

    //     return $query;
    // }
}
