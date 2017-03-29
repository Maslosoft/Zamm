<?php

use Maslosoft\Zamm\DocBlock;
use Maslosoft\Zamm\Iterator;
use Maslosoft\Zamm\ShortNamer;
?>
<?php
$namer = new ShortNamer($class);
$doc = new DocBlock($class);
?>
<table class="table">
	<tr>
		<th>
			Property
		</th>
		<th>
			Documentation
		</th>
	</tr>
	<?php foreach (Iterator::properties($class) as $name): ?>
		<tr>
			<td>
				<?= $namer->property($name)->html(); ?>
			</td>
			<td>
				<?= $doc->property($name)->html(); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>