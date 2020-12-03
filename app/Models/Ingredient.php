<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Ingredient extends Model
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
    public function pizzas()
    {
        return $this->belongsTo('App\Models\Pizza','id');

    }  
}
