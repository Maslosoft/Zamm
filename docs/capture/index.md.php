<?php

use Faker\Factory as FF;
use Maslosoft\Ilmatar\Components\Controller;
use Maslosoft\Ilmatar\Widgets\Form\ActiveForm;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\Helpers\Wrapper;
use Maslosoft\Zamm\ShortNamer as Namer;
?>
<?php
/* @var $this Controller */
/* @var $form ActiveForm */
?>
<?php
Namer::defaults()->md();
?>
<title>5. Capture</title>
#Capture

Capture allows to grab inline PHP from documentation and display it's source elsewhere.

Example:

<?php
Capture::open();
echo sprintf('<em>Is your name %s?</em>', FF::create()->firstName);
echo Capture::close()->md;
?>

Above statement is execued, it's code captured and displayed formatted. This is achevied by <?= (new Namer(Capture::class)) ?> class.

Code used in example is wrapped with <?= (new Namer(Capture::class))->open() ?> and <?= (new Namer(Capture::class))->close() ?>
functions. To get Markdown wrapped code there is appended <?= (new Namer(Wrapper::class))->md->md; ?> [wrapper indicator](../wrapper/).

Whole example, including capture calls:

```php
Capture::open();
echo sprintf('<em>Is your name %s?</em>', FF::create()->firstName);
echo Capture::close()->md;
```