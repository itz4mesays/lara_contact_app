<?php

namespace App\Models;

use App\Scopes\FilterSearchScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name', 'address', 'email', 'website'];

    public $searchColumns = ['name', 'email', 'website', 'address'];


    public function getAllCompanies()
    {
        return auth()->user()->companies()->withCount('contacts')->latest()->paginate(10)->withQueryString();
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class)->withoutGlobalScope(SearchScope::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCompaniesDropDown()
    {
        return auth()->user()->companies()->orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SearchScope);
    }
}
