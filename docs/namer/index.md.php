<?php

use Maslosoft\Ilmatar\Widgets\Form\ActiveForm;
use Maslosoft\Ilmatar\Components\Controller;
use Faker\Factory as FF;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\Namer;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Zamm;

?>
<?php
/* @var $this Controller */
/* @var $form ActiveForm */
?>
<?php
$sn = new ShortNamer(ShortNamer::class);
$n = new ShortNamer(Namer::class);
?>
<title>4. Namer</title>
#Namer

Namer helps getting fully qualified names, which could be long, and tedious to repeatedly include in code.

To get class name, wrap it with namer and cast to string, optionally with [wrapper](../wrapper/):

<?php
Capture::open();
$name = (new Namer(Capture::class))->md;
echo Capture::close()->md;
?>

This will result in fully qualified name of class:

> <?= $name; ?>


For easier usage it is possible to set output type globally, so that
it is not required to add `->md` or `->html` to set proper output:

<?php
Capture::open();
Namer::defaults()->md();
echo Capture::close()->md;
?>

## Short Namer

Alternatively, there is also <?= $sn; ?> class, to create short
class names - without namespace part. Fully qualified class name
is only present on `title` attribute of link.

Example of <?= $sn; ?> usage:

<?php
Capture::open();
$name = (new ShortNamer(Capture::class));
echo Capture::close()->md;
?>

This will result in short class name:

> <?= $name; ?>


Notice that no output type was specified, as specifying output
type with <?= $n->method('defaults'); ?> will affect both <?= $n; ?>
and <?= $sn; ?>;

## Accessing Class Parts

To get name of method or property, try to get or call it on namer instance.
This will invoke PHP magic `__get` and `__call` respectivelly:

<?php
Capture::open();
$name = (new ShortNamer(Zamm::class))->converters;
echo Capture::close()->md;
?>

This will result in creating link for `converters` property:

> <?= $name; ?>


### Alternative Syntax

In some cases method or property name might exists in namer class thus
failing to invoke PHP Magic method. In such case, it is possible to
use <?= $n->method('method'); ?> and
<?= $n->method('property'); ?> directly:


<?php
Capture::open();
$name = (new ShortNamer(Zamm::class))->property('converters');
echo Capture::close()->md;
?>

This will result in link same as in previous example:

> <?= $name; ?>



