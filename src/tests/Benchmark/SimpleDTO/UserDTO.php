<?php

declare(strict_types=1);

namespace Tests\Benchmark\SimpleDTO;

use DragonCode\SimpleDataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public int $id;
    public string $type;
    public ?string $email;
    public float $balance;
    public string $real_address;
}
