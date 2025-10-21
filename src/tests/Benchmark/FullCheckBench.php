<?php

namespace Tests\Benchmark;

use ClassTransformer\Hydrator;
use CuyZ\Valinor\MapperBuilder;
use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use AutoMapper\AutoMapper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Tests\Benchmark\PackerDTO\PurchaseDTO as PackerPurchaseDTO;
use Tests\Benchmark\JolicodeDTO\PurchaseDTO as JolicodePurchaseDTO;
use Tests\Benchmark\YzenDTO\PurchaseDTO as YzenPurchaseDTO;
use Tests\Benchmark\CuyzDTO\PurchaseDTO as CuyzPurchaseDTO;
use Tests\Benchmark\EventSauceDTO\PurchaseDTO as EventSaucePurchaseDTO;
use Tests\Benchmark\SpatieDTO\PurchaseDTO as SpatiePurchaseDTO;
use Tests\Benchmark\SimpleDTO\PurchaseDTO as DragonPurchaseDTO;

class FullCheckBench extends TestCase
{
    private array $data;
    
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->data = $this->getPurcheseObject();
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchPerfilov(): void
    {
        new PackerPurchaseDTO($this->data);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchYzen(): void
    {
        Hydrator::init()->create(YzenPurchaseDTO::class, $this->data);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchSpatie(): void
    {
        new SpatiePurchaseDTO($this->data);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchEventSauce(): void
    {
        $mapper = new ObjectMapperUsingReflection();
        $mapper->hydrateObject(EventSaucePurchaseDTO::class, $this->data);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchDragon(): void
    {
        new DragonPurchaseDTO($this->data);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchSymphony(): void
    {
        $normalizer = new ObjectNormalizer(null, null, null, new ReflectionExtractor());
        $serializer = new Serializer([$normalizer]);
        $serializer->denormalize($this->data, YzenPurchaseDTO::class);
    }

    /**
     * @Revs(1500)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchCuyz(): void
    {
        (new MapperBuilder())
            ->mapper()
            ->map(CuyzPurchaseDTO::class, \CuyZ\Valinor\Mapper\Source\Source::array($this->data));
    }

    /**
     * @Revs(30)
     * @Iterations(11)
     * @Warmup(3)
     */
    public function benchJolicode(): void
    {
        $automapper = AutoMapper::create();
        $automapper->map($this->data, JolicodePurchaseDTO::class);
    }

    public function getPurcheseObject(): array
    {
        return [
            'products' => [
                [
                    'id' => 1,
                    'name' => 'phone',
                    'price' => 43.03,
                    'description' => 'test description for phone',
                    'count' => 123
                ],
                [
                    'id' => 2,
                    'name' => 'bread',
                    'price' => 10.56,
                    'description' => 'test description for bread',
                    'count' => 321
                ],
                [
                    'id' => 2,
                    'name' => 'book',
                    'price' => 5.5,
                    'description' => 'test description for book',
                    'count' => 333
                ]
            ],
            'user' => [
                'id' => 1,
                'email' => 'fake@mail.com',
                'balance' => 10012.23,
                'type' => 'admin',
                'real_address' => 'test address',
            ]
        ];
    }
}
