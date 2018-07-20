<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html>
<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo $this->themePath('css/style.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.8.3.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.cycle.all.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.jcarousel.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.slimscroll.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.jclock.js') ?>"></script>
	
	<script type="text/javascript">
		$(function($) {
		  var options = {
			format: '%I:%M %P', // 12-hour with am/pm 
			fontFamily: 'Verdana, Times New Roman',
			fontSize: '12px',
			foreground: '#6b6b6b6b',
			background: 'transparent'
		  }
		  $('.jclock').jclock(options);
		});
	  </script>
	
		<script type="text/javascript">
//<![CDATA[
                        jQuery(document).ready(function() {jQuery('#mycarousel').jcarousel({wrap: 'last'}); }); 
                        $(document).ready(function(){
                                var inputs = 'input[type=text],input[type=password],input[type=file]';
                                $(inputs).focus(function(){
                                        $(this).css({
                                                'background-color': '#f9f5e7',
                                                'border-color': '#dcd7c7',
                                                'color': '#726c58'
                                        });
                                });
                                $(inputs).blur(function(){
                                        $(this).css({
                                                'backgroundColor': '#ffffff',
                                                'borderColor': '#dddddd',
                                                'color': '#444444'
                                        }, 500);
                                });
                                $('.menuitem a').hover(
                                        function(){
                                                $(this).fadeTo(110, 0.85);
                                                $(this).css('cursor', 'pointer');
                                        },
                                        function(){
                                                $(this).fadeTo(150, 1.00);
                                                $(this).css('cursor', 'normal');
                                        }
                                );
                                $('.money-input').keyup(function() {
                                        var creditValue = parseInt($(this).val() / 1, 10);
                                        if (isNaN(creditValue))
                                                $('.credit-input').val('?');
                                        else
                                                $('.credit-input').val(creditValue);
                                }).keyup();
                                $('.credit-input').keyup(function() {
                                        var moneyValue = parseFloat($(this).val() * 1);
                                        if (isNaN(moneyValue))
                                                $('.money-input').val('?');
                                        else
                                                $('.money-input').val(moneyValue.toFixed(2));
                                }).keyup();
                                
                                // In: js/flux.datefields.js
                                processDateFields();
                        });
                        function reload(){
                                window.location.href = '/home/?module=main';
                        }
    //]]>
    </script>
		
	
		<script type="text/javascript"> $(document).ready(function(){$('#sliderShow').cycle({ fx: 'scrollRight', easing:  'easeInCirc' }); $('.money-input').keyup(function() {var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10); if (isNaN(creditValue)) $('.credit-input').val('?'); else $('.credit-input').val(creditValue); }).keyup(); $('.credit-input').keyup(function() {var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>); if (isNaN(moneyValue)) $('.money-input').val('?'); else $('.money-input').val(moneyValue.toFixed(2)); }).keyup(); processDateFields(); }); function reload(){window.location.href = '<?php echo $this->url ?>'; } </script> <script type="text/javascript"> function updatePreferredServer(sel){var preferred = sel.options[sel.selectedIndex].value; document.preferred_server_form.preferred_server.value = preferred; document.preferred_server_form.submit(); } var spinner = new Image(); spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>'; function refreshSecurityCode(imgSelector){$(imgSelector).attr('src', spinner.src); var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>; var image = new Image(); image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random(); $(imgSelector).attr('src', image.src); } function toggleSearchForm() {$('.search-form').slideToggle('fast'); } </script> <?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?> <script type="text/javascript"> var RecaptchaOptions = {theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'}; </script> <?php endif ?>
	</head>
	<body>
		<?php $ParGFX = include('main/ParGFXConfig.php'); ?>
		<div id="wrapper">
			<div id="main">
				<div class="containerMain">
					<div id="header">
								<div class="serverStatus">
											<?php include('main/status.php'); ?>
								</div>
								<div class="loginPanel">
											<?php include('main/loginpanel.php'); ?>
								</div>
								<div id="QLButton">
									<?php include ('main/QuickLink.php') ?>
								</div>
								<div class="Items">
									<?php include ('main/carousel.php'); ?>
								</div>
								<div id="WoE">
									<?php include ('main/WoE.php') ?>
								</div>
								<div id="HOFPic">
									<?php include ('main/HOF.php') ?>
								</div>
								
								<div class="SN">
									<img src="<?php echo $this->themePath('img/SN.png' . $SN[0]); ?>" alt="" />
								<div class="SNBut">
									<a href="<?php echo $ParGFX['fb']; ?>" target="_blank"><img src="<?php echo $this->themePath('img/fb.png'); ?>" alt="" title="Facebook"></a>
									<a href="<?php echo $ParGFX['twit']; ?>" target="_blank"><img src="<?php echo $this->themePath('img/twit.png'); ?>" alt="" title="Twitter"></a>
									<a href="<?php echo $ParGFX['yt']; ?>" target="_blank"><img src="<?php echo $this->themePath('img/yt.png'); ?>" alt="" title="Youtube"></a>
								</div>
								</div>
								
								<div class="sliderArea">
									<div>
										<div id="sliderShow">
											<?php foreach ($ParGFX['sliders'] as $sliders ) { $slider = explode(",", $sliders); ?>
										<div>
											<img src="<?php echo $this->themePath('img/' . $slider[0]); ?>" alt="" />
									</div>
								<?php } ?>
										</div>
									</div>
								</div>
								
								<div class="H">
									<a href="<?php echo $this->url('main'); ?>"><img src="<?php echo $this->themePath('img/Home.png'); ?>" alt="" title=""></a>
								</div>
								<div class="I">
									<a href="<?php echo $this->url('info'); ?>"><img src="<?php echo $this->themePath('img/Info.png'); ?>" alt="" title=""></a>
								</div>
								<div class="S">
									<a href="<?php echo $this->url('staff'); ?>"><img src="<?php echo $this->themePath('img/Staff.png'); ?>" alt="" title=""></a>
								</div>
								<div class="F">
									<a href="<?php echo $ParGFX['forum']; ?>" target="_blank"><img src="<?php echo $this->themePath('img/Forum.png'); ?>" alt="" title=""></a>
								</div>
								
								<div id="server_time">
									<div class="jclock"></div>
								</div>
								
					</div>
					
					<div id="container">
						<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'index' ): ?>

						<?php else: ?>
						<div class="containerLeft">
						<?php include('main/sidebar.php'); ?>
						</div>
						<?php endif; ?>
						<div class="container<?php if( $params->get('module') == 'main' AND $params->get('action') == 'index' ) echo ""; else echo "Right"; ?>">
							<?php if ($message=$session->getMessage()): ?>
							<p class="message"><?php echo htmlspecialchars($message) ?></p>
							<?php endif ?>
							<?php include 'main/submenu.php'; ?>
							<?php include 'main/pagemenu.php' ?>
							<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>