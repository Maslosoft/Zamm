<?php

use Maslosoft\Staple\Widgets\SubNavRecursive;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\DocBlock;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Widgets\DocNavRecursive;
use Maslosoft\Zamm\Widgets\PropertiesDocs;
use Maslosoft\Zamm\Zamm;

?>
<?php
ShortNamer::defaults()->md();
$zamm = new Zamm(Zamm::class);
$namer = new ShortNamer(PropertiesDocs::class);
$doc = new DocBlock(Zamm::class);
/* @var $namer Zamm */
?>
<title>2. Properties Helper</title>
# Properties Documentation List Helper

This widget will display table with public properties linked
to API and their corresponding documentation.

To use it, echo it's instance with class name as parameter:

<?php Capture::open();
$html = new PropertiesDocs(PropertiesDocs::class);
echo Capture::close()->html();
?>

This will result in list of properties of <?= $namer; ?>:

<?= $html; ?>

[staple]: /staple/
[widgets]: ../