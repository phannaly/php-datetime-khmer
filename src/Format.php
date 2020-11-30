<?php

namespace KhmerDateTime;

trait Format
{
    /**
     * Return dateTime format
     *
     * @param $format
     * @return mixed
     */
    private function dateTimeFormat($format)
    {
        $formats = [
            'L' => $this->formatL(),
            'LL' => $this->formatLL(),
            'LLT' => $this->formatLL()." ".$this->formatT(),
            'LLL' => $this->formatLLL(),
            'LLLT' => $this->formatLLL()." ".$this->formatT(),
            'LLLL' => $this->formatLLLL(),
            'LLLLT' => $this->formatLLLL()." ".$this->formatT()
       ];

        return $formats[$format];
    }

    private function formatL()
    {
        return $this->day()."/".$this->month()."/".$this->year();
    }

    private function formatLL()
    {
        return $this->day()." ".$this->fullMonth()." ".$this->year();
    }

    private function formatT()
    {
        return $this->hour().":".$this->minute()." ".$this->meridiem();
    }

    private function formatLLL()
    {
        return $this->fullDay()." ".$this->day()." ".$this->fullMonth()." ".$this->year();
    }

    private function formatLLLL()
    {
        return "ថ្ងៃ".$this->fullDay()." ទី".$this->day()." ខែ".$this->fullMonth()." ឆ្នាំ".$this->year();
    }
}
