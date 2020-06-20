<?php declare(strict_types=1);


namespace App\Classes;


use App\Interfaces\QueryBuilder;

class MySqlQueryBuilder implements QueryBuilder
{
    protected string $table;
    protected string $fields;
    protected array $wheres = [];

    public function select(...$fields): QueryBuilder
    {
        $this->fields = implode(', ', $fields);
        return $this;
    }

    public function from(string $table): QueryBuilder
    {
        $this->table = $table;
        return $this;
    }

    public function where(string $field, string $operator, string $value): QueryBuilder
    {
        $this->wheres[] = "$field $operator '$value'";
        return $this;
    }

    public function rawSQL(): string
    {
        $sql = 'SELECT ' . $this->fields . ' FROM ' . $this->table;

        if (count($this->wheres)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->wheres);
        }

        $sql .= ';';

        return $sql;
    }
}