<?php

final class Mapper_array_Tests_Benchmark_YzenDTO_UserDTO extends \Jane\Component\AutoMapper\GeneratedMapper
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
            $result = new \Tests\Benchmark\YzenDTO\UserDTO();
        }
        if (array_key_exists('id', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'id', $value['id'])) {
            $result->id = $value['id'];
        }
        if (array_key_exists('type', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'type', $value['type'])) {
            $result->type = $value['type'];
        }
        if (array_key_exists('email', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'email', $value['email'])) {
            $value_1 = null;
            if (null !== $value['email']) {
                $value_1 = $value['email'];
            }
            $result->email = $value_1;
        }
        if (array_key_exists('balance', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'balance', $value['balance'])) {
            $result->balance = $value['balance'];
        }
        if (array_key_exists('real_address', $value) && \Jane\Component\AutoMapper\MapperContext::isAllowedAttribute($context, 'real_address', $value['real_address'])) {
            $result->real_address = $value['real_address'];
        }
        return $result;
    }
}
