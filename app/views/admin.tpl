{extends file="main.tpl"}

{block name=top}

				<!-- Header -->
					<header id="header">
						<h1><a href="{$conf->action_root}admin" >Panel administracyjny</a></h1>
					</header>

				<!-- Main -->
					<div id="main">

							<section id="content" class="main">
								<span class="image main"><img src="images/picadm.jpg" alt="" />

									<a class="button" href="{$conf->action_root}logout" style="float:right;">Wyloguj się</a>
									<a class="button" href="{$conf->action_root}profil" style="float:right;">Profil</a>
								</span>
								<h1>Zalogowany jako administrator</h1>
								<h2>Profile weterynarzy do zaakceptowania</h2>

								<!-- TABLICA WETERYNARZY -->

									<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Login</th>
														<th>Imie</th>
														<th>Nazwisko</th>
														<th>Telefon</th>
														<th>Klinika</th>
														<th>Decyzja</th>
													</tr>
												</thead>
												<tbody>
													{foreach $toaccept as $toa}
													{strip}
													<tr>
														<td>{$toa["login"]}</td>
														<td>{$toa["imie"]}</td>
														<td>{$toa["nazwisko"]}</td>
														<td>{$toa["telefon"]}</td>
														<td>{$toa["Nazwa"]}</td>
														<td>
															<a class="button" href="{$conf->action_url}vetAccept/{$toa['idUser']}">Akceptuj</a>
															<a class="button" href="{$conf->action_url}vetDelete/{$toa['idUser']}">Odrzuć</a>
														</td>
														
														
													</tr>
													{/strip}
													{/foreach}
													
												</tbody>
												
											</table>
										</div>

										<div style="background: #46e88f; text-align:center; color:white; padding-top: 10px; padding-bottom:10px; font-weight: bold;">
											{foreach $msgs->getMessages() as $msg}
												<div class="alert {if $msg->isInfo()} alert-success{/if}
													{if $msgs->isWarning()}alert-warning{/if}
													{if $msgs->isError()}alert-danger{/if}" role="alert">
													{$msg->text}
												</div>

											{/foreach}
										</div>


										

									

							</section>
							


					</div>


{/block}