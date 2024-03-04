<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['company_name', 'company_address', 'company_phone_number', 'company_email_address', 'company_logo'];

    public function rules() {
        return [
            'company_name' => 'required|unique:companies,company_name,'.$this->id.'|min:3|max:60',
            'company_address' => 'required',
            'company_phone_number' => 'required',
            'company_email_address' => 'required',
            'company_logo' => 'required'

           // 'company_logo' => 'required|file|mimes:png'
            

        ];
    }
    public function feedback()
    {

        return [
            'required' => 'O campo :attribute precisa ser preenchido',

            'company_name.unique' => 'Este nome não esta disponivel',
            'company_name.min' => 'O nome deve conter no minimo 3 caracteres',
            'company_name.max' => 'O nome deve conter no maximo 60 caracteres',

            'company_logo.mimes' => 'Formato de imagem não permitido!'
        ];
    }

    public function about() {
        return $this->hasMany('App\Models\AboutUs');
    }
}
