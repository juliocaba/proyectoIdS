<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Inventario;
use App\Repositories\BaseRepository;

/**
 * Class InventarioRepository
 * @package App\Repositories\Admin
 * @version March 3, 2022, 10:10 pm UTC
*/

class InventarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'cantidad',
        'estado'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inventario::class;
    }
}
