<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'caption', 'description', 'content', 'banner', 'video', 'active'];

    public function rules() {
        return [
            'title' => 'required|min:3|max:255',
            'caption' => 'required|min:3|max:255',
            'description' => 'required',
            'content' => 'required',

           // 'company_logo' => 'required|file|mimes:png'
            

        ];
    }
    public function feedback()
    {

        return [
            'required' => 'O campo :attribute precisa ser preenchido',
        ];
    }
}
