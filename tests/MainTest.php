<?php


use App\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /**
     * @dataProvider urlsProvider
     */
    public function testHandle(string $url)
    {
        $class = new Main($url);
        $data = $class->handle();
        $this->assertIsArray($data);
    }

    /**
     * @dataProvider wrongUrlsProvider
     */
    public function testHandleInvalidArgumentException($url)
    {
        $this->expectException( InvalidArgumentException::class );
        $class = new Main($url);
        $class->handle();
    }

    public function testHandleEmptyContent()
    {
        $class = new Main('http://fakesiteforexample.com');
        $data = $class->handle();
        $this->assertSame( [], $data );
    }

    public function urlsProvider(): array
    {
        return [
            'ya.ru'  => ['https://ya.ru'],
            'google.com'  => ['https://google.com'],
        ];
    }

    public function wrongUrlsProvider(): array
    {
        return [
            'empty'  => [''],
            'string'  => ['string'],
            'bool'  => [true],
            'int'  => [1],
        ];
    }
}
