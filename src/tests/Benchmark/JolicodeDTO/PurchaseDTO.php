<?php

declare(strict_types=1);

namespace Tests\Benchmark\JolicodeDTO;

use AutoMapper\Attribute\MapFrom;

class PurchaseDTO
{
    #[MapFrom('products')]
    /** @var ProductDTO[] */
    public array $products;

    #[MapFrom('user')]
    public UserDTO $user;
}
