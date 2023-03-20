<?php

declare(strict_types=1);

namespace Tests\Benchmark\SimpleDTO;

use DragonCode\SimpleDataTransferObject\DataTransferObject;

/**
 * @property string    $name
 * @property UserDTO $user
 */
class PurchaseDTO extends DataTransferObject
{
    protected array $products;

    protected UserDTO $user;

    protected function castProducts(array $products): array
    {
        return array_map(static function (array $product) {
            return ProductDTO::make($product);
        }, $products);
    }
    
    protected function castUser(array $user)
    {
        return UserDTO::make($user);
    }
}
