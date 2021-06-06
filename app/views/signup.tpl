{extends file="main.tpl"}

{block name=top}

<header id="header">
						<h1><a href="{$conf->action_root}signup" style="float:center;">Logowanie</a></h1>
						<p>lub jeżeli nie masz konta - zarejestruj się</p>
					</header>

							<!-- ZAWARTOŚĆ-->
					<div id="main">

							<section id="content" class="main special">


								{if count($conf->roles)>0}
									<h2>Jesteś już zalogowany. Jeżeli chcesz się wylogować i zalogować na inne konto, kliknij:<br><a class="button" href="{$conf->action_root}logout" style="float:center;">Wyloguj się</a></h2>
									{if \core\RoleUtils::inRole("admin")}
										<a href="{$conf->action_url}adminview" class="button primary fit">Panel kontrolny administratora</a>
									{/if}
									{if \core\RoleUtils::inRole("wlasciciel")}
										<a href="{$conf->action_url}profil" class="button primary fit">Profil właściciela</a>
									{/if}
									{if \core\RoleUtils::inRole("weterynarz")}
										<a href="{$conf->action_url}profilvet" class="button primary fit">Profil weterynarza</a>
									{/if}

								{else}	
									
								

										<!-- FORMULARZ LOGOWANIA -->

								<div>
									<h2>Zaloguj się</h2>
									<form method="post" action="{$conf->action_root}login">
										
											<div style="width: 30%; margin: 0 auto; clear: right; ">
												<input type="text" name="login" id="demo-name" value="" placeholder="Login" />
											</div>
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">
												<input type="password" name="password" id="demo-name" value="" placeholder="Hasło" />
											</div>

											{foreach $msgs->getMessages() as $msg}
												<div class="alert {if $msg->isInfo()} alert-success{/if}
													{if $msgs->isWarning()}alert-warning{/if}
													{if $msgs->isError()}alert-danger{/if}" role="alert">
													{$msg->text}
												</div>

											{/foreach}
											<input type="submit" value="Zaloguj" class="primary" style="margin-top: 30px;"/>
											
									</form>
								</div>

								


										<!-- OPCJA WYBORU REJESTRACJI -->

							<div>
								

								

										<!-- FORMULARZ REJESTRACJI -->

								<div id="regwlasciciel">
									<h2>Rejestracja</h2>




									<form method="post" action="{$conf->action_root}registerSave">
											
											<div style="width: 30%; margin: 0 auto; clear: right; ">
												<input type="text" name="login" id="demo-name" value="" placeholder="Login" />
											</div>
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">
												<input type="password" name="password" id="demo-name" value="" placeholder="Hasło" />
											</div>
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">
												<input type="text" name="imie" id="demo-name" value="" placeholder="Imię" />
											</div>
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">
												<input type="text" name="nazwisko" id="demo-name" value="" placeholder="Nazwisko" />
											</div>
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">
												<input type="text" name="telefon" id="demo-name" value="" placeholder="Telefon" />
											</div>
											
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">


												<label for="toggle1" class="button" style="width: 300px;">Właściciel</label>
												<input type="radio" id="toggle1" role="button" name="role" value="1" checked> <br>

												<label for="toggle2" class="button" style="width: 300px;">Weterynarz</label>
												<input type="radio" id="toggle2" role="button " name="role" value="2"> <br>

												<span id="formk"><h2>Jesteś właścicielem</h2></span>
												<span id="formv">

													<h2>Jesteś weterynarzem</h2>

													<div style="width: 100%; margin: 0 auto; clear: right;  margin-top: 20px;">
														<select name="klinika" id="demo-category thelist" style="background: #cae3de; height:200px;" size="10">
															<option value="" disabled style="width=200px; height=100px;">- Klinika -</option>
															{foreach $kliniki as $k}
															{strip}
																<option value="{$k["idKlinika"]}">{$k["Nazwa"]}</option>
															{/strip}
															{/foreach}
															
														</select>
													</div>



												</span>




											
											</div>
											
											<input type="submit" value="Zarejestruj" class="primary" style="margin-top: 30px;"/>
									</form>




								</div>




										

							</div>

							{/if}
							</section>

					</div>

{/block}
