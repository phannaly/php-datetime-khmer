<?php

namespace KhmerDateTime;

use DateTime;
use Exception;

date_default_timezone_set("Asia/Phnom_Penh");

class KhmerDateTime
{
    /**
     * @var Date
     */
    public $date;
    /**
     * @var Config
     */
    private $data;
    /**
     * @var string
     */
    private $sign;

    public function __construct()
    {
        $this->data = new Config();
        return $this;
    }

    /**
     * Parse the datetime in String format
     *
     * @param $date
     * @return static
     * @throws Exception
     */
    public static function parse($date) {
        $instance = new static();
        $instance->date = strtotime($date);

        if ($instance->isForwardSlash($date)) {
            $instance->sign = "/";
        } elseif ($instance->isDash($date)) {
            $instance->sign = "-";
        } else {
            throw new Exception('Undefined date format');
        }

        return $instance;
    }

    /**
     * Use current timestamp
     *
     * @return KhmerDateTime
     */
    public static function now()
    {
        $instance = new static();
        $instance->date = strtotime(date("Y-m-d"));

        return $instance;
    }

    /**
     * Get month in Khmer.
     *
     * @return string
     */
    public function month()
    {
        $month = date('m', $this->date);
        return $this->data->numbers($month);
    }

    /**
     * Get full month name in Khmer.
     *
     * @return string
     */
    public function fullMonth()
    {
        $month = date('n', $this->date);
        return $this->data->months($month);
    }

    /**
     * Get day in Khmer.
     *
     * @return string
     */
    public function day()
    {
        return $this->data->numbers(date('d', $this->date));
    }

    public function fullDay()
    {
        return $this->data->days(date('w', $this->date));
    }

    /**
     * Get full year 4 number in Khmer.
     *
     * @return string
     */
    public function year()
    {
        return $this->data->numbers(date('Y', $this->date));
    }

    /**
     * Get date base on format.
     *
     * @param null $format
     * @return string
     * @throws Exception
     */
    public function date($format = null)
    {
        if ($format == "long") {
            return "ថ្ងៃ".$this->fullDay()." ទី".$this->day()." ខែ".$this->fullMonth()." ឆ្នាំ".$this->year();
        }
        if ($format == "short") {
            return $this->day()." ".$this->fullMonth()." ".$this->year();
        }
        if ($format == "forward") {
            return $this->day()."/".$this->month()."/".$this->year();
        }
        if ($format == "dash") {
            return $this->day()."-".$this->month()."-".$this->year();
        }

        return implode(" ", [$this->fullDay(), $this->day(), $this->fullMonth(), $this->year()]);
    }

    /**
     * Checking if given date is a forward slash format.
     *
     * @param $date
     * @return bool
     */
    private function isForwardSlash($date)
    {
        return is_object(DateTime::createFromFormat('Y/m/d', $date));
    }

    /**
     * Checking if given date is a dash format.
     *
     * @param $date
     * @return bool
     */
    private function isDash($date)
    {
        return is_object(DateTime::createFromFormat('Y-m-d', $date));
    }
}
