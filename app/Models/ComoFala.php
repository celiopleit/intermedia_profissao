<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComoFala extends Model
{
    use HasFactory;
    protected $fillable = ['descricao'];
	protected $table = 'como_fala';
	protected $primaryKey = 'id';

}
