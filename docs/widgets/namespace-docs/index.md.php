<?php

use Maslosoft\Staple\Widgets\SubNavRecursive;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\DocBlock;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Widgets\DocNavRecursive;
use Maslosoft\Zamm\Widgets\NamespaceDocs;
use Maslosoft\Zamm\Widgets\PropertiesDocs;
use Maslosoft\Zamm\Zamm;

?>
<?php
ShortNamer::defaults()->md();
$zamm = new Zamm(Zamm::class);
$namer = new ShortNamer(NamespaceDocs::class);
$doc = new DocBlock(Zamm::class);
/* @var $namer Zamm */
?>
<title>2. Namespace Helper</title>
# Namespace Documentation List Helper

This widget will display table with class names and their
documentation from same folder and namespace as class provided as
parameter.

To use it, echo it's instance with class name as parameter:

<?php Capture::open();
$html = new NamespaceDocs(NamespaceDocs::class);
echo Capture::close()->html();
?>

This will result in list of classes in namespace same same as <?= $namer; ?>:

<?= $html; ?>


[staple]: /staple/
[widgets]: ../