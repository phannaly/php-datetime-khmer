# The PHP helpers function extract from Laravel

[![Build Status](https://travis-ci.org/phannaly/php-datetime-khmer.svg?branch=master)](https://travis-ci.org/phannaly/php-datetime-khmer)  [![StyleCI](https://github.styleci.io/repos/165952860/shield?branch=master)](https://github.styleci.io/repos/165952860)

This is a small package for convert datetime to Khmer language.

## Requirements

* PHP 7.0 or higher

## Setup

You don't need to install by composer if your project doesn't have it.

Just import it manually in `src` folder.

But If you want to install by composer, please follow command below

    composer require phannaly/php-datetime-khmer


<a name="usage"></a>
## Usage

Whenever you want to convert any datetime into Khmer language, just wrap it inside method.

Firstly, you can import or instance class
```php
use Phanna\Converter\KhmerDatetime;
....
$khmer = new Phanna\Converter\KhmerDatetime;
```

After that you can you following method below.

```php
$khmer = new KhmerDatetime;
$date = date('Y-m-d'); // or specific date that you want
// Example output 2019-01-22

$khmer->convert($date)->getDate();
// Output: ២០១៩-មករា-២២
```
### Available methods

This library accept to date format

```php
$date = '2019-01-22'; // Y-m-d
// and
$date = '2019/01/22'; // Y/m/d
```
Some useful method in this library.

```php
$khmer = new KhmerDatetime;
$date = '2019-01-22';

$khmer->convert($date)->getFullMonth();
// Output: មករា

$khmer->convert($date)->getFullYear();
// Output: ២០១៩

$khmer->convert($date)->getFullDay();
// Output: ២២

$date = '2019/01/22'; // forward slash format
$khmer->convert($date)->getDate();
// Output: ២០១៩/មករា/២២
 
$date = '2019-01-22'; // dash format
$khmer->convert($date)->getDate();
// Output: ២០១៩-មករា-២២
 
$date = '2019/01/22'; // Reverse from Y/m/d to d/m/Y
$khmer->convert($date)->getDate('reverse');
// Output: ២២/មករា/២០១៩

```

## Contributing

Feel free to contribute through PR.

## License

This package operates under the MIT License (MIT). See the [LICENSE](https://github.com/phannaly/php-datetime-khmer/blob/master/LICENSE.md) file for details.
