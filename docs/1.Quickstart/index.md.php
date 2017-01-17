<?php

use Maslosoft\Zamm\Ignore;
use Maslosoft\Zamm\Source;
use Maslosoft\Zamm\Zamm;
?>
<?php
$zamm = new Zamm(Zamm::class);
$ignore = new Zamm(Ignore::class);
/* @var $ignore Ignore */
$source = new Zamm(Source::class);
/* @var $source Source */
?>
<title>Quick Start</title>
# Zamm Quick Start Guide

##<?= $zamm; ?>


##<?= $source; ?>

##<?= $ignore; ?>
<?= $ignore::open(); ?>
<?= $ignore::close(); ?>

Example:
<?php
Ignore::open();
Ignore::open();
$object = new Zamm;
Ignore::close();
Ignore::close();
?>

This will result in plain php code in documentation:
<?php
Ignore::open();
$object = new Zamm;
Ignore::close();
?>