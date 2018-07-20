<?php
if (!defined('FLUX_ROOT')) exit;
$adminMenuItems = $this->getAdminMenuItems();
$menuItems = $this->getMenuItems();
?>
<div class="sidebar">
	<?php if (!empty($adminMenuItems) && !Flux::config('AdminMenuNewStyle')): ?>
	<table>
		<tr>
			<th><strong>Admin Menu</strong></td>
		</tr>
		<?php foreach ($adminMenuItems as $menuItem): ?>
		<tr>
			<td class="menuitem">
				<a href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>"<?php
					if ($menuItem['module'] == 'account' && $menuItem['action'] == 'logout')
						echo ' onclick="return confirm(\'Are you sure you want to logout?\')"' ?>>
					<span><?php echo htmlspecialchars($menuItem['name']) ?></span>
				</a>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php endif ?>
</div>