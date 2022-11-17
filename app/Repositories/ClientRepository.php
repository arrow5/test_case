<?php


namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Interfaces\ClientInterface;
use Illuminate\Support\Collection;

class ClientRepository implements ClientInterface
{
    private $model;

    public function __construct()
    {
        $this->model = new Client();
    }

    public function getAll(): Collection
    {
       return $this->model->orderBy('id','desc')->get();
    }

    public function store(array $args)
    {
        return $this->model->create($args);
    }

    public function getShow(int $id): Client
    {
        return $this->model->findOrFail($id);
    }

    public function update(int $id, $args)
    {
        return $this->model->findOrFail($id)->update($args);
    }

    public function destroy(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
