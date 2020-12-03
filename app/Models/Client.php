<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Client extends Model
{
    use HasFactory;
     /**
     * Trait odpowiadający za usuwanie typu soft
     */
    protected $table = 'clients';
    use SoftDeletes;

    /**
     * Pola wypełniane
     *$table->bigIncrements('IdKlient');
     * @var array
     */
    protected $fillable = [
        'Imie',
        'Nazwisko',
        'NumerTelefonu'
    ];  
}
