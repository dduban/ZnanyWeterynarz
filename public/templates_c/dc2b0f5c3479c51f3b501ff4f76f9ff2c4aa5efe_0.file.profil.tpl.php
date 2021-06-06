<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 21:55:46
  from 'C:\xampp\htdocs\znanyweterynarz\app\views\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efe3bc20b1366_48264053',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc2b0f5c3479c51f3b501ff4f76f9ff2c4aa5efe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\znanyweterynarz\\app\\views\\profil.tpl',
      1 => 1593719738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe3bc20b1366_48264053 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15391032725efe3bc209c401_50584936', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_15391032725efe3bc209c401_50584936 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_15391032725efe3bc209c401_50584936',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


				<!-- Header -->
					<header id="header">
						<h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
profil">Profil</a></h1>
						<p>Sprawdź listę zwierząt, listę wizyt lub umów nową</p>
					</header>

				<!-- Main -->
					<div id="main">

							<section id="content" class="main">

								<span class="image main"><img src="images/pic.jpg" alt="" />
									<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" style="float:right;">Wyloguj się</a>
									
									

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
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wizyty']->value, 'w');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
?>
													<tr><td><?php echo $_smarty_tpl->tpl_vars['w']->value["data"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["godzina"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["imie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["nazwisko"];?>
</td></tr>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													
												</tbody>
												
											</table>
										</div>
										<div style="width: 300px; padding-bottom:30px;">

											<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
profil">
												<label for="search">Wyszukaj wizyty danego zwierzaka: </label>
												<fieldset>

													<select name="sf_imie" id="demo-category search"style=" height: 40px;">
														<option value="all" selected disabled hidden>Wszystkie</option>
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zwierzeta3']->value, 'z3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['z3']->value) {
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['z3']->value["imie"];?>
"><?php echo $_smarty_tpl->tpl_vars['z3']->value["imie"];?>
</option>
														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</select>



													<button type="submit" >Filtruj</button>
												</fieldset>
											</form>




											
										</div>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
												<div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?> alert-success<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isWarning()) {?>alert-warning<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>alert-danger<?php }?>" role="alert">
													<?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

												</div>

											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


										<!-- FORMULARZ UMÓWIENIA WIZYTY -->

										<label for="toggle4" class="button" style="width: 300px">Umów wizytę</label>
										<input type="checkbox" id="toggle4" role="button">

										<div id="wizytaform" style="border: 3px dashed green; padding: 20px; padding-top: 15px; text-align: center;"> 
											<h3>Umawianie wizyty</h3>



											<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
wizytaSave">
											
												<div class="col-6 " style="float: left; width: 16%;">
													<input type="text" name="data" id="demo-name" value="" placeholder="Data" style="height: 40px;"/>
												</div>
												<div class="col-6 " style="float: left;width: 16%;">
													<input type="text" name="godzina" id="demo-name" value="" placeholder="Godzina" style="height: 40px;"/>
												</div>
												<div class="col-12" style="float: left; width: 16%;">
													<select name="Zwierze_idZwierze" id="demo-category" style=" height: 40px;">
														<option value="" selected disabled hidden>- Zwierzak -</option>
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zwierzeta2']->value, 'z2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['z2']->value) {
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['z2']->value["idZwierze"];?>
"><?php echo $_smarty_tpl->tpl_vars['z2']->value["imie"];?>
</option>
														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</select>
												</div>
												<div class="col-12" style="float: left; width: 17%;">
													<input type="text" name="uwagi" id="demo-name" value="" placeholder="Uwagi" style="height: 40px;"/>
												</div>
												<div class="col-12" style="float: left; width: 34%;">
													<select name="User_weterynarz" id="demo-category" style="height: 40px;">
														<option value="" selected disabled hidden>- Weterynarz -</option>
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['klinikivet']->value, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value["idUser"];?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value["Miasto"];?>
 - <?php echo $_smarty_tpl->tpl_vars['k']->value["Nazwa"];?>
 - <?php echo $_smarty_tpl->tpl_vars['k']->value["nazwisko"];?>
</option>
														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zwierzeta']->value, 'z');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['z']->value) {
?>
													<tr><td><?php echo $_smarty_tpl->tpl_vars['z']->value["imie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['z']->value["gatunek"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['z']->value["plec"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['z']->value["wiek"];?>
</td></tr>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												</tbody>
												
												
											</table>
										</div>

										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
												<div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?> alert-success<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isWarning()) {?>alert-warning<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>alert-danger<?php }?>" role="alert">
													<?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

												</div>

											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

										<label for="toggle3" class="button" style="width: 300px">Dodaj zwierzaka</label>
										<input type="checkbox" id="toggle3" role="button">

										<!-- FORMULARZ DODANIA ZWIERZAKA -->

										<div id="zwierzeform" style="border: 3px dashed green; padding: 20px; padding-top: 15px; text-align: center;"> 
											<h3>Dodaj zwierzę</h3>



											<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
zwierzeSave">
											
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


<?php
}
}
/* {/block 'top'} */
}
