<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inventario
 * @package App\Models\Admin
 * @version March 3, 2022, 10:10 pm UTC
 *
 * @property string $nombre
 * @property integer $cantidad
 * @property string $estado
 */
class Inventario extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inventarios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'cantidad',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'cantidad' => 'integer',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'cantidad' => 'required',
        'estado' => 'required'
    ];

    
}
