<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Znany Weterynarz</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
			<div id="wrapper">

				{block name=top} {/block}

				{block name=messages}

				{if $msgs->isMessage()}
				<div class="messages bottom-margin">
					<ul>
					{foreach $msgs->getMessages() as $msg}
					{strip}
						<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
					{/strip}
					{/foreach}
					</ul>
				</div>
				{/if}

				{/block}


					<footer id="footer">
						<section>
							<h2>Informacje</h2>
							<p>Strona wykonana jako projekt na zaliczenie przedmiotu projektowanie aplikacji webowych. Strona jest fikcyjna, do umówionych wizyt nie dojdzie.</p>
						
						</section>
						<section>
							<h2>Siedziba</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>ul. Będzińska 39 &bull; Sosnowiec 41-205 &bull; Poland</dd>
								<dt>Phone</dt>
								<dd>+48 32 269 18 50</dd>
								<dt>Email</dt>
								<dd><a href="#">info@znanyweterynarz.pl</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
							</ul>
						</section>
						<p class="copyright">&copy; ZnanyWeterynarz.pl  <b>|</b>  Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>

		
			<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
			<script src="{$conf->app_url}/assets/js/jquery.scrolly.min.js"></script>
			<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
			<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/assets/js/util.js"></script>
			<script src="{$conf->app_url}/assets/js/main.js"></script>

	</body>
</html>