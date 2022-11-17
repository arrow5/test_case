<?php


namespace App\Repositories\Interfaces;

use App\Models\Currency;
use Illuminate\Support\Collection;

interface CurrencyInterface
{
    public function getAll():Collection;

    public function store(array $args);

    public function getShow(int $id):Currency;

    public function update(int $id,$args);

    public function destroy(int $id);

}
