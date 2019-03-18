<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Репозиторий для работы с сущностью
 * Можте выдавать наборы данних
 * Не может создавать/изменять сущности.
 *
 * Class CoreRepository
 *
 * @package Repositories
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}