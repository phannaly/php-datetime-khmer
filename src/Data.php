<?php


namespace Phanna\Converter;


class Data
{
    private $numeric = [
        0 => "០",
        1 => "១",
        2 => "២",
        3 => "៣",
        4 => "៤",
        5 => "៥",
        6 => "៦",
        7 => "៧",
        8 => "៨",
        9 => "៩"
    ];
    private $days = ["ច័ន្ទ", "អង្គារ", "ពុធ", "ព្រហស្បតិ៍", "សុក្រ", "សៅរ៍", "អាទិត្យ"];
    private $months = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];

    /**
     * @param $day
     * @return string
     */
    public function days($day)
    {
        return $this->days[$day];
    }

    /**
     * @param $month
     * @return string
     */
    public function months($month) {
        return $this->months[--$month];
    }

    /**
     * @param $number
     * @return string
     */
    public function numbers($number) {
        $num = array_map(function ($str) {
            return $this->numeric[$str];
        }, str_split($number));

        return implode('', $num);
    }
}