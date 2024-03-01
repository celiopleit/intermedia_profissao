<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrauInstrucao extends Model
{
    use HasFactory;
    protected $fillable = ['descricao'];
	protected $table = 'grau_de_instrucao';
	protected $primaryKey = 'id';

}
