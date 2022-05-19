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
    }
    
    /**
     * company
     *
     * @return void
     */
    public function company()
    {
        return $this->belongsTo(Company::class)->withoutGlobalScopes();
    }
    
    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get contacts belong to an authenticated user
     *
     * @return void
     */
    public function getAllContacts()
    {
        $users = auth()->user();
        return $users->contacts()->with('company')->latest()->paginate(10);
    }
    
    /**
     * Get Single Contact Instance
     *
     * @param  mixed $id
     * @return Collection
     */
    public function singleContact($id): Collection
    {
        return self::findOrFail($id);
    }
    
    /**
     * Local Scope to fetch record by last created_at
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeLatestRec($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    
    /**
     * Return fullname of an authenticated user
     *
     * @return string
     */
    public function fullName(): string
    {
        return $this->first_name. ' '. $this->last_name;
    }

}
