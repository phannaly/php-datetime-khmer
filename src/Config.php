<?php

namespace KhmerDateTime;

class Config
{
    private $numeric = [
        0 => '០',
        1 => '១',
        2 => '២',
        3 => '៣',
        4 => '៤',
        5 => '៥',
        6 => '៦',
        7 => '៧',
        8 => '៨',
        9 => '៩'
    ];
    private $days = ['អាទិត្យ', 'ច័ន្ទ', 'អង្គារ', 'ពុធ', 'ព្រហស្បតិ៍', 'សុក្រ', 'សៅរ៍'];
    private $months = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];
    public $meridiem = [
        'am' => 'ព្រឹក',
        'pm' => 'ល្ងាច'
    ];

    /**
     * Get Khmer day base on index
     *
     * @param $day
     * @return string
     */
    public function days($day)
    {
        return $this->days[$day];
    }

    /**
     * Get Khmer month base on index
     *
     * @param $month
     * @return string
     */
    public function months($month)
    {
        return $this->months[--$month];
    }

    /**
     * Convert English number to Khmer number
     *
     * @param $number
     * @return string
     */
    public function numbers($number)
    {
        $num = array_map(function ($str) {
            return $this->numeric[$str];
        }, str_split($number));

        return implode('', $num);
    }
}
