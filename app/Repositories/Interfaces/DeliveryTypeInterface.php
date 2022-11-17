<?php


namespace App\Repositories\Interfaces;

use App\Models\DeliveryType;
use Illuminate\Support\Collection;

interface DeliveryTypeInterface
{
    public function getAll():Collection;

    public function store(array $args);

    public function getShow(int $id):DeliveryType;

    public function update(int $id,$args);

    public function destroy(int $id);

}
