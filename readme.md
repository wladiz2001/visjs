# Visjs

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Simple package to facilitate and automate the use of (network) charts in Laravel 5.x

using [Visjs](http://visjs.org/).

Code is 'inspired' from [laravel-chartjs](https://github.com/pjeutr/laravelvisj).


## Installation

Via Composer

``` bash
$ composer require wladiz2001/visjs
```

Finaly, for now, you must install and add to your layouts / templates the Visjs library that can be easily
found for download at: http://visjs.org/. This setting will also be improved.


## Usage

You can request to Service Container the service responsible for building the charts
and passing through fluent interface the chart settings.

```php
$service = app()->visjs
    ->name()
    ->type()
    ->size()
    ->datasets()
    ->options();
```

For now the builder needs the name of the chart, the type of chart that can be anything that is supported by visjs and the other custom configurations like, datasets, size and options.

In the dataset interface you can pass any configuration and option to your chart.
All options available in visjs documentation are supported.
Just write the configuration with php array notations and its work!


# Advanced visjs options

Since the current version allows it to add simple json string based options, it is not possible to generate options like:

```php
    options: {
        scales: {
            xAxes: [{
                type: 'time',
                time: {
                    displayFormats: {
                        quarter: 'MMM YYYY'
                    }
                }
            }]
        }
    }
```

Using the method optionsRaw(string) its possible to add a the options in raw format:

```php
        $chart->optionsRaw = "{
            legend: {
                display:false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    }  
                }]
            }
        }";
```

# Examples

1 - Network Chart:
```php
// ExampleController.php

$edges = [
    ["from" => 7905, "to" => "7886", "label" => 50068, "length" => 10],
    ["from" => -1, "to" => "7905", "label" => 100, "group" => 40]
];
$nodes = [
	["id" => -10, "shape" => "circularImage", "size" => 40, "color" => '#999', "borderWidth" => 1],
	["id" => 7905, "label" => "loyal", "value" => 500, "group" => 'big1'],
	["id" => 7886, "label" => "sensitive", "value" => 100, "group" => 'big2']
];

$visjs = app()->visjs
        ->name('networkChartTest')
        ->type('Network')
        ->size(['width' => 400, 'height' => 200])
        ->datasets(["nodes" => $nodes, "edges" => $edges])
        ->options([]);

return view('example', compact('visjs'));


 // example.blade.php

<div style="width:75%;">
    {!! $visjs->render() !!}
</div>
```

# OBS:

This README as well as the package is in development but will be constantly updated and will keep you informed as soon as
are ready for production. Thank you for understanding.

Any questions or suggestions preferably open a issue!

# License
VisJs is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]



[ico-version]: https://img.shields.io/packagist/v/wladiz2001/visjs.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/wladiz2001/visjs.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/wladiz2001/visjs/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/wladiz2001/visjs
[link-downloads]: https://packagist.org/packages/wladiz2001/visjs
[link-travis]: https://travis-ci.org/wladiz2001/visjs
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/wladiz2001
[link-contributors]: ../../contributors
