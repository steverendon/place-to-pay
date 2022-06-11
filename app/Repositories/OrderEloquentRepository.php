<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracs\OrderEloquentInterface;
use Illuminate\Database\Eloquent\Model;

final class OrderEloquentRepository implements OrderEloquentInterface
{
    private $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function save(array $order): Model
    {
        return $this->model->create($order);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function update(int $id, array $data): void
    {
        $model = $this->find($id);

        $model->update($data);
    }

    public function find(int $id): Model
    {
        return $this->model->find($id);
    }
}