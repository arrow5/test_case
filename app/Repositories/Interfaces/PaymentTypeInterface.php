<?php


namespace App\Repositories\Interfaces;

use App\Models\PaymentType;
use Illuminate\Support\Collection;

interface PaymentTypeInterface
{
    public function getAll():Collection;

    public function store(array $args);

    public function getShow(int $id):PaymentType;

    public function update(int $id,$args);

    public function destroy(int $id);

}
