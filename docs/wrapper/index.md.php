<?php

use Maslosoft\Ilmatar\Components\Controller;
use Maslosoft\Ilmatar\Widgets\Form\ActiveForm;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\Helpers\Wrapper;
use Maslosoft\Zamm\Namer;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Source;
?>
<?php
/* @var $this Controller */
/* @var $form ActiveForm */
?>
<?php
$n = new ShortNamer(Wrapper::class);
?>
<title>Wrapper</title>
#Wrapper

Wrapper is a helper, which is returned by various Zamm tools, this ensures proper
formatting, by adding HTML `pre` tag for HTML formatting, or triple ` ` ` for Markdown syntax.

There is also inline wrapper, to wrap inline snippets: class names, method names etc. 
This wraps text with `code` tag for HTML, or single ` ` ` for Markdown.

Both can be used by adding <?= $n->html->md; ?> or <?= $n->md->md; ?> indicator to selected Zamm method calls.
Alternativelly this can be invoked by appending method calls, respectivelly <?= $n->html()->md; ?> or <?= $n->md()->md; ?>.
Wrapper type is defined by Zamm, so it is automatically selected according to context.
Generally, for names it is inline, for code fragments it is multiline.

Example usage of inline wrapper:

<?php
Capture::open();
echo (new Namer(Capture::class))->html . PHP_EOL;
echo (new Namer(Capture::class))->md;
echo Capture::close()->md;
?>

Example usage of multiline wrapper:

<?php
Capture::open();
echo (new Source(Wrapper::class))->html()->md;
echo Capture::close()->html;
?>