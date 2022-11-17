<?php


namespace App\Repositories\Interfaces;

use App\Models\CustomerOrder;
use Illuminate\Support\Collection;

interface CustomerOrderInterface
{
    public function getAll():Collection;

    public function store(array $args);

    public function getShow(int $id):CustomerOrder;

    public function update(int $id,$args);

    public function destroy(int $id);

}
