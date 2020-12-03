<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Pizza extends Model
{
    use HasFactory;
     /**
     * Trait odpowiadający za usuwanie typu soft
     */
    protected $table = 'pizzas';
    use SoftDeletes;

    /**
     * Pola wypełniane
     *
     * $table->bigIncrements('id');
     */
    protected $fillable = [
        'NazwaPizza',
        'CenaBazowa',
        'Nazwa'
    ];  
    public function ingredient()
    {
        return $this->belongsTo('App\Models\Ingredient','id');

    }  

}
