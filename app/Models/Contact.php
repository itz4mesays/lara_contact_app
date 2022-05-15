<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table= 'contacts';
    protected $guarded = ['company_id', 'id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getAllContacts()
    {
        return self::orderBy('first_name', 'asc')->with('company')->where(function($query){
            if($companyId = request('company_id')){
                $query->where('company_id', $companyId);
            }
        })->paginate(10);
    }

    public function singleContact($id)
    {
        return self::whereId($id)->firstOrFail();
    }
}
