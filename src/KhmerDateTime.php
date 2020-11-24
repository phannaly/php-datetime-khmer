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
    private $config;
    /**
     * @var string
     */
    private $sign;

    public function __construct()
    {
        $this->config = new Config();
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

        if (!$instance->date) {
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
        return $this->config->numbers($month);
    }

    /**
     * Get full month name in Khmer.
     *
     * @return string
     */
    public function fullMonth()
    {
        $month = date('n', $this->date);
        return $this->config->months($month);
    }

    /**
     * Get day in Khmer.
     *
     * @return string
     */
    public function day()
    {
        return $this->config->numbers(date('d', $this->date));
    }

    /**
     * Get full day name in Khmer
     *
     * @return string
     */
    public function fullDay()
    {
        return $this->config->days(date('w', $this->date));
    }

    /**
     * Get full year 4 number in Khmer.
     *
     * @return string
     */
    public function year()
    {
        return $this->config->numbers(date('Y', $this->date));
    }

    /**
     * Get hour in Khmer
     *
     * @return string
     */
    public function hour()
    {
        $hour = date('H', $this->date);
        return $this->config->numbers($hour);
    }

    /**
     * Get minute in Khmer
     *
     * @return string
     */
    public function minute()
    {
        return $this->config->numbers(date('i', $this->date));
    }

    /**
     * Get time meridiem
     *
     * @return string
     */
    public function meridiem() {
        return  $this->config->meridiem[date('a', $this->date)];
    }

    public function format($format)
    {
        try {
            return $this->availableFormats()[$format];
        } catch (Exception $e) {
            throw new Exception("Invalid format");
        }
    }

    public function availableFormats() {
        return [
            'L' => $this->day()."/".$this->month()."/".$this->year(),
            'LL' => $this->day()." ".$this->fullMonth()." ".$this->year(),
            'LLT' => $this->day()." ".$this->fullMonth()." ".$this->year()." ".$this->hour().":".$this->minute()." ".$this->meridiem(),
            'LLL' => $this->fullDay()." ".$this->day()." ".$this->fullMonth()." ".$this->year(),
            'LLLT' => $this->fullDay()." ".$this->day()." ".$this->fullMonth()." ".$this->year()." ".$this->hour().":".$this->minute()." ".$this->meridiem(),
            'LLLL' => "ថ្ងៃ".$this->fullDay()." ទី".$this->day()." ខែ".$this->fullMonth()." ឆ្នាំ".$this->year(),
            'LLLLT' => "ថ្ងៃ".$this->fullDay()." ទី".$this->day()." ខែ".$this->fullMonth()." ឆ្នាំ".$this->year()." ".$this->hour().":".$this->minute()." ".$this->meridiem(),
        ];
    }
}
