<?php

?>
# Quick Start

##<?= $zamm = new Zamm(Zamm::class);?>

##<?= $ignore = new Zamm(Ignore::class);?>
<?= $ignore::open();?>
<?= $ignore::close();?>

Example:
<?php
Ignore::open();
Ignore::open();
$object = new Company\Project\SomeClass;
Ignore::close();
Ignore::close();
?>

This will result in plain php code in documentation:
<?php
Ignore::open();
$object = new Company\Project\SomeClass;
Ignore::close();
?>