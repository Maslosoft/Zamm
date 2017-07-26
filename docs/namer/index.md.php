<?php

use Maslosoft\Ilmatar\Widgets\Form\ActiveForm;
use Maslosoft\Ilmatar\Components\Controller;
use Faker\Factory as FF;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\Namer;
?>
<?php
/* @var $this Controller */
/* @var $form ActiveForm */
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
