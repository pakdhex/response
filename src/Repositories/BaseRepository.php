<?php
/* ==================================
    programmer : Saiful Amin
    created_at : 2022-12-23
  ================================== */
namespace Pakdhe\Response\Repositories;

use Pakdhe\Response\Traits\ApiResponser;

class BaseRepository
{
    use ApiResponser;
    protected $paginate = 10;
    public function __construct(){
        $this->paginate =  env('PAGINATION_LIST') ?? 20;
    }

    function paginate(){
        return request()->get('per_page') ?? (env('PAGINATION_LIST') ?? 20);
    }

    function customPaginate($value, $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderTapProxy($value);
        }

        $value = tap($value, function($paginatedInstance) use($callback){
            return $paginatedInstance->getCollection()->transform(function ($value) use($callback){
                return $callback($value);
            });
        });

        return $value;
    }
}
