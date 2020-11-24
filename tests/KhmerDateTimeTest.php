<?php

use KhmerDateTime\KhmerDateTime;
use PHPUnit\Framework\TestCase;

date_default_timezone_set("Asia/Phnom_Penh");

class KhmerDateTimeTest extends TestCase
{
    public function test_khmer_date_time_parsing_without_time()
    {
        $dateTime = KhmerDateTime::parse('2019-01-22');

        $this->assertEquals('២២', $dateTime->day());
        $this->assertEquals('អង្គារ', $dateTime->fullDay());
        $this->assertEquals('០១', $dateTime->month());
        $this->assertEquals('មករា', $dateTime->fullMonth());
        $this->assertEquals('២០១៩', $dateTime->year());
        $this->assertEquals('០០', $dateTime->hour());
        $this->assertEquals('០០', $dateTime->minute());
        $this->assertEquals('ព្រឹក', $dateTime->meridiem());
    }

    public function test_khmer_date_time_parsing_format_with_time()
    {
        $dateTime = KhmerDateTime::parse('2020-09-20 12:40');
        $this->assertEquals("អាទិត្យ ២០ កញ្ញា ២០២០", $dateTime->date());
        $this->assertEquals("២០/០៩/២០២០", $dateTime->format("L"));
        $this->assertEquals("២០ កញ្ញា ២០២០", $dateTime->format("LL"));
        $this->assertEquals("២០ កញ្ញា ២០២០ ១២:៤០ ល្ងាច", $dateTime->format("LLT"));
        $this->assertEquals("អាទិត្យ ២០ កញ្ញា ២០២០", $dateTime->format("LLL"));
        $this->assertEquals("អាទិត្យ ២០ កញ្ញា ២០២០ ១២:៤០ ល្ងាច", $dateTime->format("LLLT"));
        $this->assertEquals("ថ្ងៃអាទិត្យ ទី២០ ខែកញ្ញា ឆ្នាំ២០២០", $dateTime->format("LLLL"));
        $this->assertEquals("ថ្ងៃអាទិត្យ ទី២០ ខែកញ្ញា ឆ្នាំ២០២០ ១២:៤០ ល្ងាច", $dateTime->format("LLLLT"));
    }

    public function test_throw_exception_when_parsing_incorrect_date_time_format()
    {
        $this->expectException(\Exception::class);

        (new KhmerDateTime)->parse('2019\01\22');
    }

    public function test_throw_exception_when_parsing_incorrect_format()
    {
        $this->expectException(\Exception::class);

        KhmerDateTime::parse('2020-09-20 12:40')->format("other");
    }
}
