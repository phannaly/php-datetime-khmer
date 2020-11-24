# The PHP libray for convert datetime into Khmer

[![Actions Status](https://github.com/phannaly/php-datetime-khmer/workflows/Build/badge.svg)](https://github.com/phannaly/php-datetime-khmer/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This is a small package for converting datetime to Khmer language.

## Requirements

* PHP 7.0 or higher

## Setup

You don't need to install by composer if your project doesn't have it.

Just import it manually in `src` folder.

But If you want to install by a composer, please follow command below

    composer require phannaly/php-datetime-khmer


<a name="usage"></a>
## Usage

Whenever you want to convert any datetime into Khmer language, just wrap it inside method.

Firstly, you can import or instance class
```php
use KhmerDateTime\KhmerDateTime;
```

You have to parse a valid string datetime format and without specific time, it will set time to 00:00

```php
$dateTime = KhmerDateTime::parse('2019-01-22');

$dateTime->day(); // ២២
$dateTime->fullDay(); // អង្គារ
$dateTime->month(); // ០១
$dateTime->fullMonth(); // មករា
$dateTime->year(); // ២០១៩
$dateTime->minute(); // ០០
$dateTime->hour(); // ០០
$dateTime->meridiem(); // ព្រឹក
```

For example:
```php
$dateTime = KhmerDateTime::parse('2020-09-20 12:40');
```

will producing result below

| Code                         | Format    | Output  |
| --------------------------   |:---------:| -----:|
| `$dateTime->format("L")`     | `L`       | `២០/០៩/២០២០` |
| `$dateTime->format("LL")`    | `LL`      | `២០ កញ្ញា ២០២០` |
| `$dateTime->format("LLT")`   | `LLT`     | `២០ កញ្ញា ២០២០ ១២:៤០ ល្ងាច` |
| `$dateTime->format("LLL")`   | `LLL`     | `អាទិត្យ ២០ កញ្ញា ២០២០` |
| `$dateTime->format("LLLT")`  | `LLLT`    | `អាទិត្យ ២០ កញ្ញា ២០២០ ១២:៤០ ល្ងាច` |
| `$dateTime->format("LLLLT")` | `LLLL`    | `ថ្ងៃទិត្យ ទី២០ ខែកញ្ញា ឆ្នាំ២០២០` |
| `$dateTime->format("LLLLT")` | `LLLLT`   | `ថ្ងៃអាទិត្យ ទី២០ ខែកញ្ញា ឆ្នាំ២០២០ ១២:៤០ ល្ងាច` |


Using the current timestamp without specific date and time

```php
$dateTime = KhmerDateTime::now();
// or 
$dateTime = new KhmerDateTime();
````

## Contributing

Feel free to contribute through PR.

## License

This package operates under the MIT License (MIT). See the [LICENSE](https://github.com/phannaly/php-datetime-khmer/blob/master/LICENSE.md) file for details.
