<?php

namespace Base\Models;

use App\Contracts\ModelInterface;
use App\Kernel;
use NilPortugues\Sql\QueryBuilder\Builder\MySqlBuilder;

class Model implements ModelInterface
{
    /**
     * @var \PDO $connection
     */
    protected $connection;
    /**
     * @var string $table
     */
    protected $table;
    /**
     * @var MySqlBuilder $queryBuilder
     */
    protected $queryBuilder;
    /**
     * @var string $attributes
     */
    protected $attributes;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->connection = Kernel::getInstance()->getDatabaseConnection();
        $this->queryBuilder = new MySqlBuilder();
    }

    /**
     * @param int|null $id
     *
     * @return array
     */
    public function find(int $id = null) : array
    {
        $query = $this->queryBuilder->select($this->table);

        if (! empty($id)) {
            $query->where()->equals('id', $id);
        }

        $sql = $this->queryBuilder->write($query);
        $query = $this->connection->prepare($sql);
        $query->execute($this->queryBuilder->getValues());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id) : bool
    {
        $query = $this->queryBuilder->delete($this->table);
        $query->where()->equals('id', $id);

        $sql = $this->queryBuilder->write($query);

        return $this->connection->prepare($sql)
            ->execute($this->queryBuilder->getValues());
    }

    /**
     * @param int $id
     * @param array $attributes
     *
     * @return bool
     */
    public function update(int $id, array $attributes) : bool
    {
        $this->checkAttributes($attributes);

        $query = $this->queryBuilder->update($this->table, $attributes);
        $query->where()->equals('id', $id);

        $sql = $this->queryBuilder->write($query);

        return $this->connection->prepare($sql)
            ->execute($this->queryBuilder->getValues());
    }

    /**
     * @param array $attributes
     */
    protected function checkAttributes(array $attributes)
    {
        if (!$this->validAttributes($attributes)) {
            throw new \InvalidArgumentException('Attribute does not exist', 500);
        }
    }

    /**
     * @param array $attributes
     *
     * @return bool
     */
    protected function validAttributes(array $attributes) : bool
    {
        foreach ($this->attributes as $validAttribute) {
            foreach ($attributes as $key => $attribute) {
                if ($attribute === $validAttribute) {
                    unset($attributes[$key]);
                    continue 2;
                }
            }
        }

        return ! $attributes;
    }
}