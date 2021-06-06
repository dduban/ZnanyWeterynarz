{extends file="main.tpl"}

{block name=top}
					<header id="header" class="alt">
						<span class="logo"style="height: 30%;" ><img src="{$conf->app_url}/images/logo.png" alt="" /></span>
						<h1>ZnanyWeterynarz</h1>
						<p>Od ludzi dla zwierząt<br /></p>
					</header>

					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Wstęp</a></li>
							<li><a href="#first">Zaloguj</a></li>
							<li><a href="#second">Pacjent</a></li>
							<li><a href="#cta">Weterynarz</a></li>
						</ul>
					</nav>

					<div id="main">

							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Czym jesteśmy?</h2>
										</header>
										<p>Jesteśmy stroną, która ułatwia kontakt i spotkania między właścicielami zwierząt, a lekarzami weterynarii.</p>
										
									</div>
									<span class="image"><img src="{$conf->app_url}/images/zdj1.jpg" alt="" /></span>
								</div>
							</section>


							<section id="first" class="main special">
								<header class="major">
									<h2>Logowanie</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon solid major style1 fa-paw"></span>
										<h3>Jestem właścicielem</h3>
										<p>Zaloguj się lub zarejestruj jako właściciel pacjenta.</p>
										<a href="{$conf->action_root}signup" class="button">Zaloguj/Zarejestruj</a></li>
										
									</li>
									<li>
										<span class="icon solid major style2 fa-heartbeat"></span>
										<h3>Jestem lekarzem</h3>
										<p>Zaloguj się lub zarejestruj jako lekarz weterynarii.</p>
										<a href="{$conf->action_root}signup" class="button primary">Zaloguj/Zarejestruj</a></li>
									</li>
								</ul>
							</section>


							<section id="second" class="main special">
								<header class="major">
									<h2>Właściciel pacjenta</h2>
									<p>Zadaj pytanie weterynarzowi online, sprawdź terminarz i umów się, wystaw opinię. Nie stój więcej w kolejkach do gabinetu. Nie czekaj na wolną linię dzwoniąc aby zadać pytanie. Możesz zrobić to wszystko już dziś dwoma kliknięciami z domu.</p>
								</header>
								<footer class="major">
									<p> tu będa jakieś obrazki </p>
								</footer>
							</section>


							<section id="cta" class="main special">
								<header class="major">
									<h2>Lekarz weterynarii</h2>
									<p>Szybszy i łatwiejszy dostęp do uzyskania pacjentów z naszą stroną. Z łatwością wypromujesz usługi, zarządzisz terminarzem, przeprowadzisz konsultacje online i zaoszczędzisz czas.</p>
								</header>
								<ul class="statistics">
									<li class="style1">
										<span class="icon solid fa-code-branch"></span>
										<strong>5,120</strong> Średnio umawianych wizyt dziennie
									</li>
									<li class="style2">
										<span class="icon fa-folder-open"></span>
										<strong>12,192</strong> Średnio zadawanych pytań i odpowiedzi online
									</li>
									<li class="style3">
										<span class="icon solid fa-signal"></span>
										<strong>2,048</strong> Średnio wystawianych opinii dziennie
									</li>
									<li class="style4">
										<span class="icon solid fa-laptop"></span>
										<strong>4,096</strong> Średnio nowych klientów dziennie
									</li>
									<li class="style5">
										<span class="icon fa-gem"></span>
										<strong>1,024</strong> Średnio zaoszczędzonych minut dziennie
									</li>
								</ul>
								
							</section>
					</div>

{/block}