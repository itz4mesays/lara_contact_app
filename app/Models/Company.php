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

    public function getCompaniesDropDown()
    {
        return self::where('user_id', auth()->user()->id)->orderBy('name', 'asc')->pluck('name', 'id')->prepend('All Companies', '');
    }
}
