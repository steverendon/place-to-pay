<?php

namespace App\Repositories\Contracs;

use App\Domain\OrderEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface OrderEloquentInterface
{
    public function save(array $order): Model;
    public function all(): Collection;
    public function update(int $id, array $order): void;
    public function find(int $id): Model;
}