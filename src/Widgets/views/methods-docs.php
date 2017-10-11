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
<?php if (!empty($this->title)): ?>

	<h3><?= $this->title; ?></h3>

<?php endif; ?>
<p>
	<a
		href="javascript://"
		class="btn btn-link"
		onclick="jQuery('.method-is-getter').toggle();jQuery('.method-is-setter').toggle();jQuery(this).toggleClass('btn-danger btn-link')">
		Toggle getters and setters
	</a>
</p>
<table class="table">
	<tr>
		<th>
			Method
		</th>
		<th>
			Documentation
		</th>
	</tr>
	<?php foreach (Iterator::methods($class) as $name): ?>
		<?php
		$class = "";
		if (preg_match('~^get[A-Z0-9]~', $name))
		{
			$class = "method-is-getter";
		}
		if (preg_match('~^set[A-Z0-9]~', $name))
		{
			$class = "method-is-setter";
		}
		?>
		<tr class="<?= $class; ?>">
			<td>
				<?= $namer->method($name)->html(); ?>
			</td>
			<td>
				<?= $doc->method($name)->html(); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>