<?php

declare(strict_types=1);

namespace Tests\Benchmark\PackerDTO;

use DtoPacker\AbstractDto;

class UserDTO extends AbstractDto
{
    public int $id;
    public string $type;
    public ?string $email;
    public float $balance;
    public string $real_address;
}
