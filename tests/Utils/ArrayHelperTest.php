<?php

namespace Utils;

use App\Utils\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperTest extends TestCase
{
    /**
     * @dataProvider arraysProvider
     */
    public function testGetArrayItemsSum($data)
    {
        $returnData = ArrayHelper::getArrayItemsSum($data);
        $this->assertIsInt($returnData);
    }

    public function testGetArrayItemsSumTen()
    {
        $data = ['test' => 10];
        $returnData = ArrayHelper::getArrayItemsSum($data);
        $this->assertSame(10, $returnData);
    }

    public function arraysProvider(): array
    {
        return [
            'empty array'  => [[]],
            'array'  => [['test' => 2]],
        ];
    }
}
