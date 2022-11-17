<?php


namespace App\Repositories;


use App\Models\Client;
use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyInterface;
use Illuminate\Support\Collection;

class CurrencyReposetory implements CurrencyInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new Currency();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id','desc')->get();
    }

    public function store(array $args)
    {
        return $this->model->create($args);
    }

    public function getShow(int $id): Currency
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
