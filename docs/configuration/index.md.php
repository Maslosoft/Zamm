<?php

use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Widgets\PropertiesDocs;
use Maslosoft\Zamm\Zamm;
?>
<?php
ShortNamer::defaults()->md();
$zamm = new Zamm(Zamm::class);
$namer = new ShortNamer(Zamm::class);
$doc = new Maslosoft\Zamm\DocBlock(Zamm::class);
/* @var $namer Zamm */
?>
<title>3. Configuration</title>
# Zamm Configuration Guide

## Configuration variables

Following public properies are defined to configure behavior of Zamm generator.
Default values should suffice. These can also be configured in `.zamm.yml`.

<?= new PropertiesDocs(Zamm::class); ?>

## .zamm.yml

Configuration can also be stored within your project root in file `.zamm.yml` (dont forget dot at beginning).

Configuration variables are same as properties of <?= $namer; ?> class.