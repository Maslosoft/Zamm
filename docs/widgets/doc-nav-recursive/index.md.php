<?php

use Maslosoft\Staple\Widgets\SubNavRecursive;
use Maslosoft\Zamm\Capture;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Widgets\DocNavRecursive;
use Maslosoft\Zamm\Zamm;

?>
<?php
ShortNamer::defaults()->md();
$zamm = new Zamm(Zamm::class);
$namer = new ShortNamer(DocNavRecursive::class);
$doc = new Maslosoft\Zamm\DocBlock(Zamm::class);
/* @var $namer Zamm */
?>
<title>1. Sub Navigation</title>
# Recursive Sub Navigation

This is extended part of [Staple][staple] project but it's useful in
documentation to provide automatic links to sub pages relative to current page.

For shorthand notation, this can take a string title as an argument, or array
of options. This class is named <?= $namer; ?>.

To use it, simply echo it's instance:

<?php Capture::open();
echo new DocNavRecursive();
echo Capture::close()->html();
?>

And it will display links to sub pages of current page. In this case there are
none. Check [widgets page for example][widgets]


[staple]: /staple/
[widgets]: ../