<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Models\LogRecording;
use Illuminate\Support\Facades\Auth;

class Model extends EloquentModel
{
    public function customCreate(array $data)
    {
        $model = $this->create($data);

        LogRecording::create([
            'user_id' => Auth::id(),
            'table' => $this->getTable(),
            'content_id' => $this->getKey(),
            'action' => 'creating',
        ]);

        return $model;
    }

    public function customUpdate(array $data)
    {
        $this->update($data);

        LogRecording::create([
            'user_id' => Auth::id(),
            'table' => $this->getTable(),
            'content_id' => $this->getKey(),
            'action' => 'updating',
        ]);

        return $this;
    }

    public function customDelete()
    {
        LogRecording::create([
            'user_id' => Auth::id(),
            'table' => $this->getTable(),
            'content_id' => $this->getKey(),
            'action' => 'deleting',
        ]);

        return $this->delete();
    }
}
