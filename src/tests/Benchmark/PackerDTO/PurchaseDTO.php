<?php

declare(strict_types=1);

namespace Tests\Benchmark\PackerDTO;

use DtoPacker\AbstractDto;

class PurchaseDTO extends AbstractDto
{
    protected array|ProductDTO $products;

    protected UserDTO $user;
}
