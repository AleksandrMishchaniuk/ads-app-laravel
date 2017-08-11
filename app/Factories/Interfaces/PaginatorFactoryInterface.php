<?php

namespace App\Factories\Interfaces;

use App\Entities\Interfaces\AdEntityInterface;

/**
 *
 */
interface PaginatorFactoryInterface
{
    /**
     * Create a new paginator instance.
     *
     * @param  mixed  $items
     * @param  int  $total
     * @param  int  $per_page
     * @param  int  $current_page
     * @return mixed
     */
    public function create($items, $total, $per_page, $current_page);
}
