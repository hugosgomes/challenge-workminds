<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EstadoRepository;
use App\Entities\Estado;
use App\Validators\EstadoValidator;

/**
 * Class EstadoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EstadoRepositoryEloquent extends BaseRepository implements EstadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estado::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EstadoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
