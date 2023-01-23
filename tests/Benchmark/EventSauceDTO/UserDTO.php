<?php
declare(strict_types=1);

namespace Tests\Benchmark\EventSauceDTO;


class UserDTO
{
    public function __construct(
        public int $id,
        public string $type,
        public ?string $email,
        public float $balance,
        public string $real_address
    )
    {
    }
}
