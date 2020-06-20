<?php declare(strict_types=1);


namespace App\Interfaces;


interface QueryBuilder
{
    public function select(...$fields): QueryBuilder;

    public function from(string $table): QueryBuilder;

    public function where(string $field, string $operator, string $value): QueryBuilder;

    public function rawSQL(): string;
}