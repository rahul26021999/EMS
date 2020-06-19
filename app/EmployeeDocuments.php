<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EmployeeDocuments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'file', 'id',
    ];

    public function Employee(){
    	return $this->belongsTo('App\Employee');
    }
    
    public function getFileUrl(){
       return Storage::url($this->file);
    }

}
