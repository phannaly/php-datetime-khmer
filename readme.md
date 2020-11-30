# The PHP libray for convert datetime into Khmer

[![Actions Status](https://github.com/phannaly/php-datetime-khmer/workflows/Build/badge.svg)](https://github.com/phannaly/php-datetime-khmer/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This is a small package for converting datetime to Khmer language.

## Requirements

* PHP 7.0 or higher

## Setup

You don't need to install by composer if your project doesn't have it.

Just import it manually in `src` folder.

But If you want to install by a composer, please follow the command below

    composer require phannaly/php-datetime-khmer


<a name="usage"></a>
## Usage

Whenever you want to convert any DateTime into Khmer language, just wrap it inside method.

Firstly, you can import or instance class
```php
use KhmerDateTime\KhmerDateTime;
```

You have to parse a valid string DateTime format and without a specific time, it will set time to 00:00

```php
$dateTime = KhmerDateTime::parse('2019-05-22');

$dateTime->day(); // ២២
$dateTime->fullDay(); // ពុធ
$dateTime->month(); // ០៥
$dateTime->fullMonth(); // ឧសភា
$dateTime->year(); // ២០១៩
$dateTime->minute(); // ០០
$dateTime->hour(); // ០០
$dateTime->meridiem(); // ព្រឹក
$dateTime->week(); // ៤
$dateTime->fullWeek(); // សប្តាហ៍ទី៤
$dateTime->weekOfYear(); // ២១
$dateTime->fullWeekOfYear(); // សប្តាហ៍ទី២១
$dateTime->quarter(); // ២
$dateTime->fullQuarter(); // ត្រីមាសទី២
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
| `$dateTime->format("LLLLT")` | `LLLL`    | `ថ្ងៃអាទិត្យ ទី២០ ខែកញ្ញា ឆ្នាំ២០២០` |
| `$dateTime->format("LLLLT")` | `LLLLT`   | `ថ្ងៃអាទិត្យ ទី២០ ខែកញ្ញា ឆ្នាំ២០២០ ១២:៤០ ល្ងាច` |

If you wanna use DateTime duration in Khmer, you can use `fromNow()` method that checks the date that you parse compare with your current timestamp.
The default `fromNow` method will add space between duration, if you want to remove space just add `fromNow(false)`
Ex:
```php
KhmerDateTime::parse('2012-10-20')->fromNow() // ៧ ឆ្នាំមុន
KhmerDateTime::parse('2012-10-20')->fromNow(false) // ៧ឆ្នាំមុន
```

Below is the example how `fromNow()` method works

| Code                                                   | Current timestamp    | Output  |
| -------------------------------------------------------|:--------------------:| -------:|
| `KhmerDateTime::parse('2012-10-20')->fromNow()`        | `2020-09-20`         | `៧ ឆ្នាំមុន` |
| `KhmerDateTime::parse('2020-03-20')->fromNow()`        | `2020-09-20`         | `៦ ខែមុន` |
| `KhmerDateTime::parse('2020-09-15')->fromNow()`        | `2020-09-20`         | `៥ ថ្ងៃមុន` |
| `KhmerDateTime::parse('2020-09-15 02:00')->fromNow()`  | `2020-09-15 06:00`   | `៤ ម៉ោងមុន` |
| `KhmerDateTime::parse('2020-09-15 06:00')->fromNow()`  | `2020-09-15 06:03`   | `៣ នាទីមុន` |

If you parse the timestamp in the future

| Code                                                   | Current timestamp    | Output  |
| -------------------------------------------------------|:--------------------:| -------:|
| `KhmerDateTime::parse('2027-10-20')->fromNow()`        | `2020-09-20`         | `៧ ឆ្នាំទៀត` |
| `KhmerDateTime::parse('2021-03-20')->fromNow()`        | `2020-09-20`         | `៦ ខែទៀត` |
| `KhmerDateTime::parse('2020-09-25')->fromNow()`        | `2020-09-20`         | `៥ ថ្ងៃទៀត` |
| `KhmerDateTime::parse('2020-09-15 10:00')->fromNow()`  | `2020-09-15 06:00`   | `៤ ម៉ោងទៀត` |
| `KhmerDateTime::parse('2020-09-15 06:03')->fromNow()`  | `2020-09-15 06:00`   | `៣ នាទីទៀត` |

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
