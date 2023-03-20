<?php

declare(strict_types=1);

namespace Tests\Benchmark\PackerDTO;

use DtoPacker\AbstractDto;

class ProductDTO extends AbstractDto
{
    public int $id;
    public string $name;
    public float $price;
    public string $description;
    public int $count;
}
