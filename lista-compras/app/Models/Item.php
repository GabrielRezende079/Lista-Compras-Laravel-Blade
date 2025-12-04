<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model // Modelo Item que representa a tabela 'items' no banco de dados
{
    protected $fillable = ['nome','quantidade']; // Define os campos que podem ser preenchidos em massa
}
