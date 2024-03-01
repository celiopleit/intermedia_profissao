<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fluencia extends Model
{
    use HasFactory;
    protected $fillable = ['descricao'];
	protected $table = 'fluencia';
	protected $primaryKey = 'id';

}
