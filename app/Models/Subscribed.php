<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribed extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'active'];

    public function rules() {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:6|max:60',

        ];
    }
    public function feedback()
    {

        return [
            'required' => 'O campo :attribute precisa ser preenchido',
        ];
    }
}
