<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
 
    public $timestamp=false;
    public $updated_at=false;
    public $created_at=false;

    protected $fillable = ['id'];
        protected $hidden = array('created_at', 'updated_at');
    
        public function origin(){
            $this->belongsTo('App\origin');
        }
    

 
}
