<?php


namespace App\Repositories;

use App\Models\DeliveryType;
use App\Repositories\Interfaces\DeliveryTypeInterface;
use Illuminate\Support\Collection;

class DeliveryTypeReposetory implements DeliveryTypeInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new DeliveryType();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id','desc')->get();
    }

    public function store(array $args)
    {
        return $this->model->create($args);
    }

    public function getShow(int $id): DeliveryType
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
