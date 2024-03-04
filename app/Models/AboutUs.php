<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'about_us', 'mission', 'vision', 'values', 'facebook', 'instagram', 'twitter', 'gmail'];

    public function rules()
    {
        return [
            'company_id' => 'required|unique:about_us,company_id,' . $this->id,
            'about_us' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'values' => 'required'
        ];
    }

    public function feedback()
    {

        return [
            'required' => 'The field :attribute needs to be filled in',
            'company_id.unique' => 'This company already has a description',
        ];
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
