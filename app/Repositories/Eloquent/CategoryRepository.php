<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}