<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="PageNotFounded" style="margin-left: 20px;width: 680px;">
<h2><?php echo htmlspecialchars(Flux::message('PageNotFoundHeading')) ?></h2>
<p><?php echo htmlspecialchars(Flux::message('PageNotFoundInfo')) ?></p>
<p><span class="request"><?php echo $_SERVER['REQUEST_URI'] ?></span></p>
</div>