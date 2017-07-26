<?php

use Maslosoft\Zamm\DocBlock;
use Maslosoft\Zamm\Iterator;
use Maslosoft\Zamm\ShortNamer;
use Maslosoft\Zamm\Widgets\PropertiesDocs;

?>
<?php
/* @var $this PropertiesDocs */
$namer = new ShortNamer($class);
$doc = new DocBlock($class);
?>
<?php if(!empty($this->title)):?>

    <h3><?= $this->title; ?></h3>

<?php endif;?>
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