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

<title>Namer</title>
#Namer

Namer helps getting fully qualified names, which could be long, and tedious to repeatedly include in code.

To get class name, wrap it with namer and cast to string, optionally with [wrapper](../wrapper/):

<?php
Capture::open();
echo (new Namer(Capture::class))->md;
echo Capture::close()->md;
?>