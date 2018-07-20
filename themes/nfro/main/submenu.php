<?php if (!defined('FLUX_ROOT')) exit; ?> 
<?php if (!empty($adminMenuItems) && Flux::config('AdminMenuNewStyle')): ?> 
<div id="adminmenu"> 
<?php $mItems = array(); foreach ($adminMenuItems as $menuItem) $mItems[] = sprintf('<a href="%s">%s</a>', $menuItem['url'], $menuItem['name']) ?> 
<strong>Admin</strong>: 
<?php echo implode(' / ', $mItems) ?> 
</div> <?php endif ?> 
<?php $subMenuItems = $this->getSubMenuItems(); $menus = array() ?> 
<?php if (!empty($subMenuItems)): ?> 
<div id="submenu"><strong>Menu:</strong> 
<?php foreach ($subMenuItems as $menuItem): ?> 
<?php $menus[] = sprintf('<a href="%s" class="sub-menu-item%s">%s</a>', $this->url($menuItem['module'], $menuItem['action']), $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action'] ? ' current-sub-menu' : '', htmlspecialchars($menuItem['name'])) ?> 
<?php endforeach ?> 
<?php echo implode(' / ', $menus) ?> 
</div> 
<?php endif ?>