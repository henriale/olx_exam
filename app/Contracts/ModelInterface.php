<?php

namespace App\Contracts;

interface ModelInterface
{
    public function find(int $id = null) : array;
    public function delete(int $id) : bool;
    public function update(int $id, array $attributes) : bool;
}