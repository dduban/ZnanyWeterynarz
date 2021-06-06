{extends file="main.tpl"}

{block name=top}

				<!-- Header -->
					<header id="header">
						<h1>Profil</h1>
						<p>PANEL LEKARZA WETERYNARII</p>
					</header>

				<!-- Main -->
					<div id="main">

							<section id="content" class="main">
								<span class="image main"><img src="images/picvet.jpg" alt="" /></span>
								<a class="button" href="{$conf->action_root}logout" style="float:right;">Wyloguj się</a>
							</section>
							<section id="content" class="main">
								<h1>Zalogowany jako weterynarz</h1>
								<h2>Moje wizyty</h2>

									<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Dzień</th>
														<th>Godzina</th>
														<th>Zwierzak</th>
														<th>Właściciel</th>
														<th>Odwołaj wizytę</th>
													</tr>
												</thead>
												<tbody>
													{foreach $wizyty as $w}
													{strip}
													<tr>
														<td>{$w["data"]}</td>
														<td>{$w["godzina"]}</td>
														<td>{$w["nazwa"]}</td>
														<td>{$w["imie"]} {$w["nazwisko"]}</td>
														<td><a class="button" href="{$conf->action_url}wizytaDelete/{$w['idSpotkanie']}">Odwołaj</a></td>
														
														
													</tr>
													{/strip}
													{/foreach}
													
												</tbody>
												
											</table>
										</div>
							</section>


					</div>


{/block}