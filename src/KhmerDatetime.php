<?php

namespace Phanna\Converter;

use DateTime;

class KhmerDatetime
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

    public function __construct($date)
    {
        $this->date = $date;
        $this->khmerMonth = $this->getKhmerMonths();
        $this->khmerNumber = $this->getKhmerNumber();
        $this->internationalMonth = $this->getInternationalMonth();

        return $this;
    }

    /**
     * Immediately given date with static method
     *
     * @param  string $date
     * @return static
     */
    public static function with($date) 
    {
        return new static($date);
    }
    /**
     * Get full month name in Khmer.
     *
     * @return string
     */
    public function getFullMonth()
    {
        $month = date('F', strtotime($this->date));

        $monthIndex = array_search($month, $this->internationalMonth);

        return $this->khmerMonth[$monthIndex];
    }

    /**
     * Get full day name in Khmer.
     *
     * @return string
     */
    public function getFullDay()
    {
        $dateNumber = date('d', strtotime($this->date));

        return $this->khmerNumber[$dateNumber[0]].''.$this->khmerNumber[$dateNumber[1]];
    }

    /**
     * Get full year 4 number in Khmer.
     *
     * @return string
     */
    public function getFullYear()
    {
        $khmerNumber = $this->getKhmerNumber();
        $yearFullNumber = date('Y', strtotime($this->date));

        $month = array_map(function ($str) use ($khmerNumber) {
            return $khmerNumber[$str];
        }, str_split($yearFullNumber));

        return implode('', $month);
    }

    /**
     * Get date base on format.
     *
     * @param string $revers
     *
     * @return string
     */
    public function getDate($revers = null)
    {
        if ($this->isForwardSlah($this->date)) {
            return $this->getForwardSlahFormat($revers);
        }

        if ($this->isDash($this->date)) {
            return $this->getDashFormat($revers);
        }

        throw new \Exception('Undefined date format');
    }

    /**
     * Checking if given date is a forward slash format.
     *
     * @return bool
     */
    public function isForwardSlah()
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
     * @return string
     */
    public function getForwardSlahFormat($revers)
    {
        return $this->format('/', $revers);
    }

    /**
     * Get date in khmer format as Y-m-d.
     *
     * @return string
     */
    public function getDashFormat($revers)
    {
        return $this->format('-', $revers);
    }

    /**
     * Return given date format.
     *
     * @param string $sign
     *
     * @return string
     */
    public function format($sign, $revers)
    {
        if ($revers === 'revers') {
            return $this->getFullDay().$sign.$this->getFullMonth().$sign.$this->getFullYear();
        }

        return $this->getFullYear().$sign.$this->getFullMonth().$sign.$this->getFullDay();
    }

    /**
     * Get khmer number from 0 to 9.
     *
     * @return array
     */
    public function getKhmerNumber()
    {
        return ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
    }

    /**
     * Get internation month in full nam.
     *
     * @return aray
     */
    public function getInternationalMonth()
    {
        return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    }

    /**
     * Get khmer month in full name.
     *
     * @return array
     */
    public function getKhmerMonths()
    {
        return ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];
    }
}
