<?php


namespace App\Repositories;


use App\Models\CustomerOrder;
use App\Repositories\Interfaces\CustomerOrderInterface;
use Illuminate\Support\Collection;

class CustomerOrderReposetory implements CustomerOrderInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new CustomerOrder();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id','desc')->get();
    }

    public function store(array $args)
    {
        return $this->model->create($args);
    }

    public function getShow(int $id): CustomerOrder
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
