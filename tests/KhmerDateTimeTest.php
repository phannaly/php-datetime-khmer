<?php

use KhmerDateTime\KhmerDateTime;
use PHPUnit\Framework\TestCase;

date_default_timezone_set("Asia/Phnom_Penh");

class KhmerDateTimeTest extends TestCase
{
    public function test_khmer_date_time_parsing_without_time()
    {
        $dateTime = KhmerDateTime::parse('2019-05-22');

        $this->assertEquals('២២', $dateTime->day());
        $this->assertEquals('ពុធ', $dateTime->fullDay());
        $this->assertEquals('០៥', $dateTime->month());
        $this->assertEquals('ឧសភា', $dateTime->fullMonth());
        $this->assertEquals('២០១៩', $dateTime->year());
        $this->assertEquals('០០', $dateTime->hour());
        $this->assertEquals('០០', $dateTime->minute());
        $this->assertEquals('ព្រឹក', $dateTime->meridiem());
        $this->assertEquals('៤', $dateTime->week());
        $this->assertEquals('សប្តាហ៍ទី៤', $dateTime->fullWeek());
        $this->assertEquals('២១', $dateTime->weekOfYear());
        $this->assertEquals('សប្តាហ៍ទី២១', $dateTime->fullWeekOfYear());
        $this->assertEquals('២', $dateTime->quarter());
        $this->assertEquals('ត្រីមាសទី២', $dateTime->fullQuarter());
    }

    public function test_khmer_date_time_parsing_format_with_time()
    {
        $dateTime = KhmerDateTime::parse('2020-09-20 12:40');
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

        KhmerDateTime::parse('2019\01\22');
    }

    public function test_throw_exception_when_parsing_incorrect_format()
    {
        $this->expectException(\Exception::class);

        KhmerDateTime::parse('2020-09-20 12:40')->format("other");
    }

    public function test_date_time_from_now_in_year()
    {
        $now = new DateTime("2020-09-20");
        $dateTime = KhmerDateTime::parse('2012-10-20');

        $this->assertEquals("៧ ឆ្នាំមុន", $dateTime->durationFrom($now, true));
    }
    public function test_date_time_from_now_in_month()
    {
        $now = new DateTime("2020-09-20");
        $dateTime = KhmerDateTime::parse('2020-03-20');

        $this->assertEquals("៦ ខែមុន", $dateTime->durationFrom($now, true));
    }

    public function test_date_time_from_now_in_day()
    {
        $now = new DateTime("2020-09-20");
        $dateTime = KhmerDateTime::parse('2020-09-15');

        $this->assertEquals("៥ ថ្ងៃមុន", $dateTime->durationFrom($now, true));
    }

    public function test_date_time_from_now_in_hour()
    {
        $now = new DateTime("2020-09-15 06:00");
        $dateTime = KhmerDateTime::parse('2020-09-15 02:00');

        $this->assertEquals("៤ ម៉ោងមុន", $dateTime->durationFrom($now, true));
    }

    public function test_date_time_from_now_in_minute()
    {
        $now = new DateTime("2020-09-15 06:03");
        $dateTime = KhmerDateTime::parse('2020-09-15 06:00');

        $this->assertEquals("៣ នាទីមុន", $dateTime->durationFrom($now, true));
    }

    public function test_date_time_from_now_in_minute_for_future()
    {
        $now = new DateTime("2020-09-15");
        $dateTime = KhmerDateTime::parse('2021-09-15');

        $this->assertEquals("១ ឆ្នាំទៀត", $dateTime->durationFrom($now, true));
    }

    public function test_date_time_from_now_without_space()
    {
        $now = new DateTime("2020-09-20");
        $dateTime = KhmerDateTime::parse('2012-10-20');

        $this->assertEquals("៧ឆ្នាំមុន", $dateTime->durationFrom($now, false));
    }
}
