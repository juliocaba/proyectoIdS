<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Turno;
use App\Repositories\BaseRepository;

/**
 * Class TurnoRepository
 * @package App\Repositories\Admin
 * @version March 20, 2022, 9:42 pm UTC
*/

class TurnoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Turno::class;
    }
}
