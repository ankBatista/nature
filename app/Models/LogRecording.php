<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRecording extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'table', 'content_id', 'action']; 

    public function rules() {
        return [
            'user_id' => 'required',
            'table' => 'required',
            'content_id' => 'required',
            'action' => 'required',
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
