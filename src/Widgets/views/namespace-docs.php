<?php

use Maslosoft\Zamm\DocBlock;
use Maslosoft\Zamm\Iterator;
use Maslosoft\Zamm\ShortNamer;
?>

<table class="table">
	<tr>
		<th>
			Class Name
		</th>
		<th>
			Documentation
		</th>
	</tr>
	<?php foreach (Iterator::ns($class) as $name): ?>
		<?php
		$namer = new ShortNamer($name);
		$doc = new DocBlock($name);
		?>
		<tr>
			<td>
				<?= $namer; ?>
			</td>
			<td>
				<?= (new \Parsedown)->text((string) $doc); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>