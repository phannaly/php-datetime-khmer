# The PHP libray for convert datetime into Khmer

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
// Using import namespace
use Phanna\Converter\KhmerDateTime;

// Using fully-qualified class name
$khmer = new Phanna\Converter\KhmerDateTime($date);
```

After that you can you following method below.

```php
$date = '2019-01-22'; // or specific date that you want
$khmer = new KhmerDatetime($date);

$khmer->getDate();
// Output: ២០១៩-មករា-២២
```

### Available methods

This library accept two date format

```php
$date = '2019-01-22'; // Y-m-d
// and
$date = '2019/01/22'; // Y/m/d
```
There are two way of converting date
    - One is passing date through constructor
    - Second use date with static method

```php
$date = '2019-01-22';

// With constructor
$khmer = new KhmerDatetime($date);

// With static method
$khmer = KhmerDatetime::with($date);

$khmer->getFullMonth();
// Output: មករា

$khmer->getFullYear();
// Output: ២០១៩

$khmer->getFullDay();
// Output: ២២

$khmer = new KhmerDatetime('2019/01/22'); // forward slash format
$khmer->getDate();
// Output: ២០១៩/មករា/២២
 
$khmer = new KhmerDatetime('2019-01-22'); // dash format
$khmer->getDate();
// Output: ២០១៩-មករា-២២
 
$khmer = new KhmerDatetime('2019/01/22'); // Reverse from Y/m/d to d/m/Y
$khmer->getDate('reverse');
// Output: ២២/មករា/២០១៩

// Or wrap it in one line
KhmerDatetime::with('2019/01/22')->getDate();
// Output: ២០១៩/មករា/២២
```

## Contributing

Feel free to contribute through PR.

## License

This package operates under the MIT License (MIT). See the [LICENSE](https://github.com/phannaly/php-datetime-khmer/blob/master/LICENSE.md) file for details.
