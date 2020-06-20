<?php declare(strict_types=1);


namespace App\Classes;


use App\Interfaces\QueryBuilder;

class Product
{
    protected QueryBuilder $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function getProducts()
    {
        return $this->queryBuilder
            ->select('price', 'name', 'quantity')
            ->from('products')
            ->where('price', '>', '0')
            ->where('quantity', '>', '5')
            ->rawSql();
    }
}