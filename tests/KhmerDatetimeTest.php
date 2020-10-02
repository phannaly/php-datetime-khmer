<?php

use Phanna\Converter\KhmerDatetime;

class KhmerDatetimeTest extends \PHPUnit\Framework\TestCase
{
    public $khmer;

    public function setUp()
    {
        $date = '2019-01-22';
        $this->khmer = new KhmerDatetime($date);
    }

    public function test_get_full_month_in_khmer()
    {
        $this->assertEquals('មករា', $this->khmer->getFullMonth());
    }

    public function test_get_full_day_in_khmer()
    {
        $this->assertEquals('២២', $this->khmer->getFullDay());
    }

    public function test_get_full_year_in_khmer()
    {
        $this->assertEquals('២០១៩', $this->khmer->getFullYear());
    }

    public function test_check_dash_format_date()
    {
        $this->assertTrue($this->khmer->isDash());
    }

    public function test_check_forward_slash_format()
    {
        $date = date('2019/01/22');
        $khmer = new KhmerDatetime($date);

        $this->assertFalse($this->khmer->isForwardSlah());
        $this->assertTrue($khmer->isForwardSlah());
    }

    public function test_get_date_in_khmer()
    {
        $this->assertEquals('២០១៩-មករា-២២', $this->khmer->getDate());
    }

    public function test_get_reverse_date_in_khmer()
    {
        $this->assertEquals('២២-មករា-២០១៩', $this->khmer->getDate('reverse'));
    }

    public function test_with_static_method()
    {
        $date = date('2019-01-22');
        $khmer = KhmerDatetime::with($date);
        $this->assertEquals('២០១៩-មករា-២២', $khmer->getDate());
    }

    public function test_throw_exception_when_wrong_format()
    {
        $this->expectException(\Exception::class);

        $date = date('2019\01\22');
        $khmer = (new KhmerDatetime($date))->getDate();
    }
}
