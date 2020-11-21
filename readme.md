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
// Using import namespace
use KhmerDateTime\KhmerDateTime;
```

```php
//This library accepts two date formats when parsing.

$date = '2019-01-22'; // Y-m-d
// and
$date = '2019/01/22'; // Y/m/d

$dateTime = KhmerDateTime::parse($date); // or specific date that you want

$dateTime->day(); // ២២
$dateTime->fullDay(); // អង្គារ
$dateTime->month(); // ០១
$dateTime->fullMonth(); // មករា
$dateTime->year(); // ២០១៩
```

You can access date with following format

```php
$dateTime = KhmerDateTime::parse('2019-01-22');

$dateTime->date(); // អង្គារ ២២ មករា ២០១៩
$dateTime->date("short"); // ២២ មករា ២០១៩
$dateTime->date("dash"); // ២២-០១-២០១៩
$dateTime->date("forward"); // ២២/០១/២០១៩
$dateTime->date("long"); // ថ្ងៃអង្គារ ទី២២ ខែមករា ឆ្នាំ២០១៩
```

Using the current timestamp without specific date

```php
$dateTime = KhmerDateTime::now();
````

## Contributing

Feel free to contribute through PR.

## License

This package operates under the MIT License (MIT). See the [LICENSE](https://github.com/phannaly/php-datetime-khmer/blob/master/LICENSE.md) file for details.
