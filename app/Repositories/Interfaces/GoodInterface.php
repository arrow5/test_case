<?php


namespace App\Repositories\Interfaces;

use App\Models\Good;
use Illuminate\Support\Collection;

interface GoodInterface
{
    public function getAll():Collection;

    public function store(array $args);

    public function getShow(int $id):Good;

    public function update(int $id,$args);

    public function destroy(int $id);

}
