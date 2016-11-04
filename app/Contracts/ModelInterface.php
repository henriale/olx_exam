<?php

namespace App\Contracts;

interface ModelInterface
{
    /**
     * @param int|null $id
     *
     * @return array
     */
    public function find(int $id = null) : array;

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id) : bool;

    /**
     * @param int $id
     * @param array $attributes
     *
     * @return bool
     */
    public function update(int $id, array $attributes) : bool;
}