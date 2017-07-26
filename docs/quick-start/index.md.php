<?php

use Maslosoft\Zamm\ApiUrl;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\Ignore;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Source;
use Maslosoft\Zamm\Zamm;
?>
<?php
ShortNamer::defaults()->md();
$zamm = new Zamm(Zamm::class);
$ignore = new Zamm(Ignore::class);
/* @var $ignore Ignore */
$source = new Zamm(Source::class);
/* @var $source Source */

$namer = new ShortNamer(ShortNamer::class);
?>
<title>1. Quick Start</title>
# Zamm Quick Start Guide

### API Links and [naming][namer]

Zamm can generate links to api made by [apigen][apigen]. To use
this feature add API roots for specified namespaces:

<?php
Capture::open();
ApiUrl::setRoot([
        '/my-project/api/' => 'Maslosoft\\MyProject'
]);
echo Capture::close()->md();
?>

Then it can be used to create links to API of class,
it's properties or methods using <?= $namer; ?> ([more][namer]):

<?php
Capture::open();
$typeUrl = new ShortNamer(ApiUrl::class);
// NOTE: setRoot is method of ApiUrl
$methodUrl = (new ShortNamer(ApiUrl::class))->setRoot();
echo Capture::close()->md();
?>

Above will result in following links:

> <?= $typeUrl; ?> and <?= $methodUrl; ?>.

### Capturing code parts

Code fragments embedded in documentation can be [captured][capture]
with <?= new ShortNamer(Capture::class); ?>. This is will slice out
file fragment and store it internally. Later this can be outputted
as a code example. Thus resulting in valid PHP example code.

[apigen]: https://github.com/ApiGen/ApiGen
[capture]: ../capture/
[namer]: ../namer/