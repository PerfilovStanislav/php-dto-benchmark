<?php

final class Mapper_array_Tests_Benchmark_YzenDTO_PurchaseDTO extends \Jane\Component\AutoMapper\GeneratedMapper
{
    public function __construct()
    {
    }
    public function &map($value, array $context = array())
    {
        if (null === $value) {
            return $value;
        }
        $result = $context['target_to_populate'] ?? null;
        if (null === $result) {
            $result = new \Tests\Benchmark\YzenDTO\PurchaseDTO();
        }
        $context = \Jane\Component\AutoMapper\MapperContext::withIncrementedDepth($context);
        if (array_key_exists('products', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'products', $value['products'])) {
            $result->products = $value['products'];
        }
        if (array_key_exists('user', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'user', $value['user'])) {
            $result->user =& $this->mappers['Mapper_array_Tests\\Benchmark\\YzenDTO\\UserDTO']->map($value['user'], \Jane\Component\AutoMapper\MapperContext::withNewContext($context, 'user'));
        }
        return $result;
    }
    public function injectMappers(\Jane\Component\AutoMapper\AutoMapperRegistryInterface $autoMapperRegistry) : void
    {
        $this->mappers['Mapper_array_Tests\\Benchmark\\YzenDTO\\UserDTO'] = $autoMapperRegistry->getMapper('array', 'Tests\\Benchmark\\YzenDTO\\UserDTO');
    }
}
