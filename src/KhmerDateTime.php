<?php

namespace KhmerDateTime;

use Exception;

date_default_timezone_set("Asia/Phnom_Penh");

class KhmerDateTime
{
    use Format;

    public $dateTime;
    /**
     * @var Config
     */
    private $config;
    /**
     * @var string
     */

    public function __construct()
    {
        $this->config = new Config();
        $this->dateTime = strtotime(date("Y-m-d H:i"));
        return $this;
    }

    /**
     * Parse the datetime in String format
     *
     * @param $dateTime
     * @return static
     * @throws Exception
     */
    public static function parse($dateTime) {
        $instance = new static();
        $instance->dateTime = strtotime($dateTime);

        if (!$instance->dateTime) {
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
        return new static();
    }

    /**
     * Get month in Khmer.
     *
     * @return string
     */
    public function month()
    {
        return $this->config->numbers(date('m', $this->dateTime));
    }

    /**
     * Get full month name in Khmer.
     *
     * @return string
     */
    public function fullMonth()
    {
        return $this->config->months(date('n', $this->dateTime));
    }

    /**
     * Get day in Khmer.
     *
     * @return string
     */
    public function day()
    {
        return $this->config->numbers(date('d', $this->dateTime));
    }

    /**
     * Get full day name in Khmer
     *
     * @return string
     */
    public function fullDay()
    {
        return $this->config->days(date('w', $this->dateTime));
    }

    /**
     * Get full year 4 number in Khmer.
     *
     * @return string
     */
    public function year()
    {
        return $this->config->numbers(date('Y', $this->dateTime));
    }

    /**
     * Get hour in Khmer
     *
     * @return string
     */
    public function hour()
    {
        $hour = date('H', $this->dateTime);
        return $this->config->numbers($hour);
    }

    /**
     * Get minute in Khmer
     *
     * @return string
     */
    public function minute()
    {
        return $this->config->numbers(date('i', $this->dateTime));
    }

    /**
     * Get quarter in Khmer
     *
     * @return string
     */
    public function quarter()
    {
        $month = date('m', $this->dateTime);
        return $this->config->numbers(ceil($month / 3));
    }

    /**
     * Get quarter in Khmer
     *
     * @return string
     */
    public function fullQuarter()
    {
        return "ត្រីមាសទី".$this->quarter();
    }

    /**
     * Get time meridiem
     *
     * @return string
     */
    public function meridiem() {
        return $this->config->meridiem[date('a', $this->dateTime)];
    }

    /**
     * Get week of month
     *
     * @return string
     */
    public function week() {
        // https://stackoverflow.com/a/32624747/4345720
        $firstOfMonth = strtotime(date("Y-m-01", $this->dateTime));
        $weekOfMonth = (date("W", $this->dateTime) - date("W", $firstOfMonth)) + 1;

        return $this->config->numbers($weekOfMonth);
    }

    /**
     * Get full week of months
     *
     * @return string
     */
    public function fullWeek() {
        return "សប្តាហ៍ទី".$this->week();
    }

    /**
     * Get week of year
     *
     * @return string
     */
    public function weekOfYear() {
        return $this->config->numbers((int) date("W", $this->dateTime));
    }

    /**
     * Get full week of year
     * @return string
     */
    public function fullWeekOfYear() {
        return "សប្តាហ៍ទី".$this->weekOfYear();
    }

    /**
     * Return dateTime base on format
     *
     * @param $format
     * @return mixed
     * @throws Exception
     */
    public function format($format)
    {
        try {
            return $this->dateTimeFormat($format);
        } catch (Exception $e) {
            throw new Exception("Invalid format");
        }
    }
}
