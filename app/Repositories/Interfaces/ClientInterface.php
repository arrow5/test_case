<?php


namespace App\Repositories\Interfaces;


use App\Models\Client;
use Illuminate\Support\Collection;

interface ClientInterface
{
    public function getAll():Collection;

    public function store(array $args);

    public function getShow(int $id):Client;

    public function update(int $id,$args);

    public function destroy(int $id);

}
