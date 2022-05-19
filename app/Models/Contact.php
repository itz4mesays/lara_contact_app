<?php

namespace App\Models;

use App\Scopes\FilterScope;
use App\Scopes\FilterSearchScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, FilterSearchScope;

    protected $table= 'contacts';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    public $searchColumns = ['first_name', 'last_name', 'email'];
    public $filterColumns = ['company_id'];

    public static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new FilterScope);
        // static::addGlobalScope(new SearchScope);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllContacts()
    {
        $users = auth()->user();
        return $users->contacts()->with('company')->latest()->paginate(10);
    }

    public function singleContact($id): Collection
    {
        return self::findOrFail($id);
    }

    public function scopeLatestRec($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function fullName(): string
    {
        return $this->first_name. ' '. $this->last_name;
    }
}
