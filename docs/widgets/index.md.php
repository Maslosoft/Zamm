<?php

use Maslosoft\Staple\Widgets\SubNavRecursive;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Widgets\DocNavRecursive;
use Maslosoft\Zamm\Zamm;
?>
<?php
ShortNamer::defaults()->md();
$zamm = new Zamm(Zamm::class);
$namer = new ShortNamer(Zamm::class);
$doc = new Maslosoft\Zamm\DocBlock(Zamm::class);
/* @var $namer Zamm */
?>
<title>7. Widgets</title>
# Zamm Widgets

Zamm depends on [Staple][staple] project, so it's widgets can be
used to enhance documentation. There are also built-in ones, especially
suited for class-based documentation generation.

<?= new DocNavRecursive('Available widgets'); ?>

In fact above list is [made with one of those widgets][sub-nav].

[staple]: /staple/
[sub-nav]: doc-nav-recursive/