<?php

namespace Phanna\Converter;

use DateTime;
use Exception;

class KhmerDateTime
{
    /**
     * @var array
     */
    private $khmerNumber = [];
    /**
     * @var array
     */
    private $internationalMonth = [];
    /**
     * @var array
     */
    private $khmerMonth = [];
    /**
     * @var Date
     */
    public $date;
    /**
     * @var Data
     */
    private $data;

    public function __construct()
    {
        $this->data = new Data();
        return $this;
    }

    public static function now()
    {
        return new Now();
    }

    /**
     * Get full month name in Khmer.
     *
     * @return string
     */
    public function month()
    {
        $month = date('n', strtotime($this->date));
        return $this->data->months($month);
    }

    /**
     * Get full day name in Khmer.
     *
     * @return string
     */
    public function day()
    {
        $dayOfMonth = date('d', strtotime($this->date));
        return $this->data->numbers($dayOfMonth);
    }

    public function dayName()
    {
        $dayOfMonth = date('w', strtotime($this->date));
        return $this->data->days($dayOfMonth);
    }

    /**
     * Get full year 4 number in Khmer.
     *
     * @return string
     */
    public function year()
    {
        return $this->data->numbers(date('Y', strtotime($this->date)));
    }

    /**
     * Get date base on format.
     *
     * @param string $reverse
     *
     * @return string
     * @throws Exception
     */
    public function date($reverse = null)
    {
        if ($this->isForwardSlash()) {
            return $this->forwardSlash($reverse);
        }

        if ($this->isDash()) {
            return $this->getDashFormat($reverse);
        }

        throw new Exception('Undefined date format');
    }

    /**
     * Checking if given date is a forward slash format.
     *
     * @return bool
     */
    public function isForwardSlash()
    {
        return is_object(DateTime::createFromFormat('Y/m/d', $this->date));
    }

    /**
     * Checking if given date is a dash format.
     *
     * @return bool
     */
    public function isDash()
    {
        return is_object(DateTime::createFromFormat('Y-m-d', $this->date));
    }

    /**
     * Get date in khmer format as Y/m/d.
     *
     * @param $reverse
     * @return string
     */
    public function forwardSlash($reverse)
    {
        return $this->format('/', $reverse);
    }

    /**
     * Get date in khmer format as Y-m-d.
     *
     * @return string
     */
    public function getDashFormat($reverse)
    {
        return $this->format('-', $reverse);
    }

    /**
     * Return given date format.
     *
     * @param string $sign
     *
     * @return string
     */
    public function format($sign, $reverse)
    {
        if ($reverse === 'reverse') {
            return $this->day().$sign.$this->month().$sign.$this->year();
        }

        return $this->year().$sign.$this->month().$sign.$this->day();
    }

    public function parse($date)
    {
        $this->date = $date;
        return $this;
    }
}
