<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name', 'address', 'email', 'website'];

    public function getAllCompanies()
    {
        return self::latest()->paginate(10);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCompaniesDropDown()
    {
        return self::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
    }
}
