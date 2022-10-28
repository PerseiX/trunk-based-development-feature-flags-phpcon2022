<?php

namespace Tbd\Main\Products;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;
use Tbd\Main\FeatureFlags\FeatureFlag;

class ProductsListController
{
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $products = $this->repository->listProducts();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                "id"          => $product->id,
                "name"        => $product->title,
                "description" => $product->description,
                "price"       => $product->price,
            ];
        }

        return Response::json($data);
    }
}