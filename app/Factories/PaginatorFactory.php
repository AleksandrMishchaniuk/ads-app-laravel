<?php

namespace App\Factories;

use App\Factories\Interfaces\PaginatorFactoryInterface;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

/**
 *
 */
class PaginatorFactory implements PaginatorFactoryInterface
{
    /**
     * {@inheritDoc}
     * @return Paginator
     */
    public function create($items, $total, $per_page, $current_page)
    {
        return new Paginator($items, $total, $per_page, $current_page);
    }
}
