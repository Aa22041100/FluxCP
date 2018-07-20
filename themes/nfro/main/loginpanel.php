<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if (!$session->isLoggedIn()): ?>      
	<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post" autocomplete="off">
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
	<div class="loginRow">
		<div class="loginLeft">
			<table cellspacing="0" cellpadding="0">
				<tr><td><input type="text" name="username" class="inputClass" placeholder="Username..." autocomplete="off" /></td></tr>
				<tr><td><input type="password" name="password" class="inputClass" placeholder="Password..." /></td></tr>
			</table>
		</div>
		
		<div class="loginRight">
			<input type="submit" value=" " class="loginBtn" />
		</div>
		<table cellspacing="0" cellpadding="0">
		<tr>
			<td class="forgotPassword"><a href="<?php echo $this->url('account','resetpass'); ?>">Forgot Password?</a></td>
		</tr>
		</table>
		<div class="Register2">
			<a href="<?php echo $this->url('account','create')?>"><img src="<?php echo $this->themePath('img/Reg.png'); ?>" alt="" title="Register"></a>
		</div>
	</div>
	</form>
<?php else:?>
	<div class="loggedIn">
	<div class="logged">
	Welcome, <?php echo htmlspecialchars($session->account->userid) ?>
	<a href="<?php echo $this->url('account','view')?>">My Account</a>
	<a class="logout" href="<?php echo $this->url('account','logout')?>" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
	</div>
	</div>
<?php endif?>
