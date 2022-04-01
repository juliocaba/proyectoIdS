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
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'cantidad' => 'integer',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'cantidad' => 'numeric|required|min:1',
        'descripcion' => ''
    ];

    
}
