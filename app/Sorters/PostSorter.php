<?php

namespace App\Sorters;

use Illuminate\Database\Eloquent\Builder;


class PostSorter extends QuerySorter
{
    /**
     * @param string $mode
     * @return Builder
     */
    public function name(string $mode = 'desc'): Builder
    {
        return $this->builder->orderBy('name', $mode);
    }

    /**
     * @param string $mode
     * @return Builder
     */
    public function updatedAt(string $mode = 'desc'): Builder
    {
        return $this->builder->orderBy('updated_at', $mode);
    }


}

