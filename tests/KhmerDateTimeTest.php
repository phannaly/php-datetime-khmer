<?php

use KhmerDateTime\KhmerDateTime;
use PHPUnit\Framework\TestCase;

date_default_timezone_set("Asia/Phnom_Penh");

class KhmerDateTimeTest extends TestCase
{
    public function test_khmer_date_time_parsing()
    {
        $dateTime = KhmerDateTime::parse('2019-01-22');
        $this->assertEquals('២២', $dateTime->day());
        $this->assertEquals('អង្គារ', $dateTime->fullDay());
        $this->assertEquals('០១', $dateTime->month());
        $this->assertEquals('មករា', $dateTime->fullMonth());
        $this->assertEquals('២០១៩', $dateTime->year());
        $this->assertEquals("អង្គារ ២២ មករា ២០១៩", $dateTime->date());
        $this->assertEquals("២២ មករា ២០១៩", $dateTime->date("short"));
        $this->assertEquals("២២-០១-២០១៩", $dateTime->date("dash"));
        $this->assertEquals("២២/០១/២០១៩", $dateTime->date("forward"));
        $this->assertEquals("ថ្ងៃអង្គារ ទី២២ ខែមករា ឆ្នាំ២០១៩", $dateTime->date("long"));
    }

    public function test_throw_exception_when_wrong_format()
    {
        $this->expectException(\Exception::class);

        (new KhmerDateTime)->parse('2019\01\22');
    }
}
