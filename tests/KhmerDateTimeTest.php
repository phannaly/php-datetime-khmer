<?php

use Phanna\Converter\KhmerDateTime;
use Phanna\Converter\Now;
use PHPUnit\Framework\TestCase;

class KhmerDateTimeTest extends TestCase
{
    public $khmer;

    public function setUp()
    {
        $date = '2019-01-22';
        $this->khmer = (new KhmerDateTime)->parse($date);
    }

    public function test_get_full_month_in_khmer()
    {
        $this->assertEquals('មករា', $this->khmer->month());
    }

    public function test_get_full_day_in_khmer()
    {
        $this->assertEquals('២២', $this->khmer->day());
    }

    public function test_get_full_year_in_khmer()
    {
        $this->assertEquals('២០១៩', $this->khmer->year());
    }

    public function test_check_dash_format_date()
    {
        $this->assertTrue($this->khmer->isDash());
    }

    public function test_check_forward_slash_format()
    {
        $khmer = (new KhmerDateTime)->parse('2019/01/22');

        $this->assertFalse($this->khmer->isForwardSlash());
        $this->assertTrue($khmer->isForwardSlash());
    }

    public function test_get_date_in_khmer()
    {
        $this->assertEquals('២០១៩-មករា-២២', $this->khmer->date());
    }

    public function test_get_reverse_date_in_khmer()
    {
        $this->assertEquals('២២-មករា-២០១៩', $this->khmer->date('reverse'));
    }

    public function test_throw_exception_when_wrong_format()
    {
        $this->expectException(\Exception::class);

        (new KhmerDateTime)->parse('2019\01\22')->date();
    }

    public function test_get_reverse_date_in_khme()
    {
        $dt = (new KhmerDateTime())->parse("2020/12/22");
        $nameOfDay = new Now($dt);
        var_dump($nameOfDay->format());
//        $this->assertEquals('២២-មករា-២០១៩', $this->khmer->date('reverse'));
    }
}
