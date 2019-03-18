<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить категории для вывода пагинатором.
     *
     * @param int|null $perPage
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = Null)
    {
        $columns = [
            'id', 'title', 'slug', 'is_published', 'published_at', 'user_id',
            'category_id',
        ];
        $result  = $this->startConditions()->select($columns)
                        ->orderBy('id', 'DESC')->with(['category:id,title', 'user:id,name'])->paginate($perPage);
        return $result;
    }
}