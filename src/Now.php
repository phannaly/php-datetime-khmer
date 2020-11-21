<?php


namespace Phanna\Converter;

use DateTime;
use Phanna\Converter\KhmerDateTime;

date_default_timezone_set("Asia/Phnom_Penh");
class Now
{
    private $khmerDateTime;

    public function __construct($datetime)
    {
        $this->khmerDateTime = $datetime;
    }

    public function format($format = null)
    {
        return $this->fullFormat();
    }

    private function fullFormat()
    {
        return $this->khmerDateTime->dayName().", ".$this->khmerDateTime->day()." ".$this->khmerDateTime->month()." ".$this->khmerDateTime->year();
    }
}