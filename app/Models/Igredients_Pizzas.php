<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igredients_Pizzas extends Model
{
   use HasFactory;
     /**
     * Trait odpowiadający za usuwanie typu soft
     */
    protected $table = 'ingredients';
    use SoftDeletes;

    /**
     * Pola wypełniane
     *
     * @var array
     */
    protected $fillable = [
        'Nazwa',
        'Cena'
    ];   
}