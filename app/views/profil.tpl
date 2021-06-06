{extends file="main.tpl"}

{block name=top}

				<!-- Header -->
					<header id="header">
						<h1><a href="{$conf->action_root}profil">Profil</a></h1>
						<p>Sprawdź listę zwierząt, listę wizyt lub umów nową</p>
					</header>

				<!-- Main -->
					<div id="main">

							<section id="content" class="main">

								<span class="image main"><img src="images/pic.jpg" alt="" />
									<a class="button" href="{$conf->action_root}logout" style="float:right;">Wyloguj się</a>
									
									

								</span>
								<h1>Zalogowany jako właściciel</h1>
								<h2>Moje wizyty</h2>

								<!-- TABLICA WIZYT -->

									<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Data</th>
														<th>Godzina</th>
														<th>Zwierzak</th>
														<th>Weterynarz</th>
													</tr>
												</thead>
												<tbody>
													{foreach $wizyty as $w}
													{strip}
													<tr>
														<td>{$w["data"]}</td>
														<td>{$w["godzina"]}</td>
														<td>{$w["imie"]}</td>
														<td>{$w["nazwisko"]}</td>
														
														
													</tr>
													{/strip}
													{/foreach}
													
												</tbody>
												
											</table>
										</div>
										<div style="width: 300px; padding-bottom:30px;">

											<form action="{$conf->action_url}profil">
												<label for="search">Wyszukaj wizyty danego zwierzaka: </label>
												<fieldset>

													<select name="sf_imie" id="demo-category search"style=" height: 40px;">
														<option value="all" selected disabled hidden>Wszystkie</option>
														{foreach $zwierzeta3 as $z3}
														{strip}
															<option value="{$z3["imie"]}">{$z3["imie"]}</option>
														{/strip}
														{/foreach}
													</select>



													<button type="submit" >Filtruj</button>
												</fieldset>
											</form>




											
										</div>
										{foreach $msgs->getMessages() as $msg}
												<div class="alert {if $msg->isInfo()} alert-success{/if}
													{if $msgs->isWarning()}alert-warning{/if}
													{if $msgs->isError()}alert-danger{/if}" role="alert">
													{$msg->text}
												</div>

											{/foreach}


										<!-- FORMULARZ UMÓWIENIA WIZYTY -->

										<label for="toggle4" class="button" style="width: 300px">Umów wizytę</label>
										<input type="checkbox" id="toggle4" role="button">

										<div id="wizytaform" style="border: 3px dashed green; padding: 20px; padding-top: 15px; text-align: center;"> 
											<h3>Umawianie wizyty</h3>



											<form method="post" action="{$conf->action_root}wizytaSave">
											
												<div class="col-6 " style="float: left; width: 16%;">
													<input type="text" name="data" id="demo-name" value="" placeholder="Data" style="height: 40px;"/>
												</div>
												<div class="col-6 " style="float: left;width: 16%;">
													<input type="text" name="godzina" id="demo-name" value="" placeholder="Godzina" style="height: 40px;"/>
												</div>
												<div class="col-12" style="float: left; width: 16%;">
													<select name="Zwierze_idZwierze" id="demo-category" style=" height: 40px;">
														<option value="" selected disabled hidden>- Zwierzak -</option>
														{foreach $zwierzeta2 as $z2}
														{strip}
															<option value="{$z2["idZwierze"]}">{$z2["imie"]}</option>
														{/strip}
														{/foreach}
													</select>
												</div>
												<div class="col-12" style="float: left; width: 17%;">
													<input type="text" name="uwagi" id="demo-name" value="" placeholder="Uwagi" style="height: 40px;"/>
												</div>
												<div class="col-12" style="float: left; width: 34%;">
													<select name="User_weterynarz" id="demo-category" style="height: 40px;">
														<option value="" selected disabled hidden>- Weterynarz -</option>
														{foreach $klinikivet as $k}
														{strip}
															<option value="{$k["idUser"]}">{$k["Miasto"]} - {$k["Nazwa"]} - {$k["nazwisko"]}</option>
														{/strip}
														{/foreach}
													</select>
												</div>
												
												<input type="submit" value="Umów się" class="primary" style="margin-top:15px;"/>
											
											</form>
										</div>
								
										<!-- TABLICA ZWIERZĄT -->

									<div style="clear:both;"><br><b><h2>Moje zwierzęta</h2></b>

								
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Imię</th>
														<th>Gatunek</th>
														<th>Płeć</th>
														<th>Wiek</th>
													</tr>
												</thead>
												<tbody>
													{foreach $zwierzeta as $z}
													{strip}
													<tr>
														<td>{$z["imie"]}</td>
														<td>{$z["gatunek"]}</td>
														<td>{$z["plec"]}</td>
														<td>{$z["wiek"]}</td>
														
														
													</tr>
													{/strip}
													{/foreach}
												</tbody>
												
												
											</table>
										</div>

										{foreach $msgs->getMessages() as $msg}
												<div class="alert {if $msg->isInfo()} alert-success{/if}
													{if $msgs->isWarning()}alert-warning{/if}
													{if $msgs->isError()}alert-danger{/if}" role="alert">
													{$msg->text}
												</div>

											{/foreach}

										<label for="toggle3" class="button" style="width: 300px">Dodaj zwierzaka</label>
										<input type="checkbox" id="toggle3" role="button">

										<!-- FORMULARZ DODANIA ZWIERZAKA -->

										<div id="zwierzeform" style="border: 3px dashed green; padding: 20px; padding-top: 15px; text-align: center;"> 
											<h3>Dodaj zwierzę</h3>



											<form method="post" action="{$conf->action_root}zwierzeSave">
											
												<div class="col-6 " style="float: left; width: 25%;">
													<input type="text" name="imie" id="demo-name" value="" placeholder="Imię" style="height: 40px;"/>
												</div>
												<div class="col-6 " style="float: left;width: 25%;">
													<input type="text" name="gatunek" id="demo-name" value="" placeholder="Gatunek" style="height: 40px;"/>
												</div>
												<div class="col-6 " style="float: left;width: 25%;">
													<input type="text" name="wiek" id="demo-name" value="" placeholder="Wiek" style="height: 40px;"/>
												</div>
												
												<div class="col-12" style="float: left; width: 25%;">
													<select name="plec" id="demo-category" style="height: 40px;">
														<option value="" selected disabled hidden>- Płeć -</option>
														<option value="on">Samiec</option>
														<option value="ona">Samica</option>
													</select>
												</div>
												
												<input type="submit" value="Dodaj zwierzę" class="primary" style="margin-top:15px;"/>
											
											</form>
										</div>


									</div>

							</section>
							


					</div>


{/block}