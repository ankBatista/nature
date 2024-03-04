<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'office', 'photograph', 'instagram', 'facebook'];

    public function rules() {
        return [
            'name' => 'required|min:3|max:80',
            'office' => 'required|min:3|max:60',
           // 'photograph' => 'required|file|mimes:png'
            

        ];
    }
    public function feedback()
    {

        return [
            'required' => 'O campo :attribute precisa ser preenchido',
        ];
    }
}
