<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cliente
 * @package App\Models\Admin
 * @version March 10, 2022, 1:40 pm UTC
 *
 * @property string $nombre
 * @property string $telefono
 */
class Cliente extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre_cliente',
        'nombre_perro',
        'tamaño',
        'telefono',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_cliente' => 'string',
        'nombre_perro' => 'string',
        'tamaño' => 'string',
        'telefono' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_cliente' => 'required',
        'nombre_perro' => 'required',
        'tamaño'=> 'required',
        'telefono' => 'numeric|required',
        'descripcion' => 'required'
        
    ];

    
}
