<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primeryKey="id";
    public $timestamp=false;
    public $updated_at=false;
    public $created_at=false;
}
