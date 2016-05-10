<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alert extends Model
{
	protected $fillable = ['id', 'idproj', 'label']; 
}
