<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveData extends Model
{
    use HasFactory;
    protected $table = 'save_data';
    protected $primeryKey="id";
    public $timestamp=false;
    public $updated_at=false;
    public $created_at=false;
}
