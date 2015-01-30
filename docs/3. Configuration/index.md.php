<?php

use Maslosoft\Zamm\Namer;
use Maslosoft\Zamm\Zamm;
?>
<?php
$zamm = new Zamm(Zamm::class);
$namer = new Namer(Zamm::class);
/* @var $namer Zamm */
?>

# Zamm Configuration Guide

## Configuration variables

Following public properies are defined to configure behavior of Zamm generator.
Default values should suffice. These can also be configured in `.zamm.yml`.

###<?= $namer->decorators; ?>
<?= $zamm->property('decorators'); ?>

###<?= $namer->extractor; ?>
<?= $zamm->property('extractor'); ?>

## .zamm.yml

Configuration can also be stored within your project root in file `.zamm.yml` (dont forget dot at beginning).

Configuration variables are same as properties of <?= $namer; ?> class.