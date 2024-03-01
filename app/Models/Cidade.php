<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $fillable = ['codregional','uf','codmunic','municipio'];
	protected $table = 'cidade';
	protected $primaryKey = 'id';

}
