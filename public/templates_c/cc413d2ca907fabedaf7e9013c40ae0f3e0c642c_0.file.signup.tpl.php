<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 21:48:52
  from 'C:\xampp\htdocs\znanyweterynarz\app\views\signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efe3a2404d7f5_10579468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc413d2ca907fabedaf7e9013c40ae0f3e0c642c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\znanyweterynarz\\app\\views\\signup.tpl',
      1 => 1593719316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe3a2404d7f5_10579468 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1048110005efe3a2403f2c3_46711240', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1048110005efe3a2403f2c3_46711240 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1048110005efe3a2403f2c3_46711240',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<header id="header">
						<h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
signup" style="float:center;">Logowanie</a></h1>
						<p>lub jeżeli nie masz konta - zarejestruj się</p>
					</header>

							<!-- ZAWARTOŚĆ-->
					<div id="main">

							<section id="content" class="main special">


								<?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
									<h2>Jesteś już zalogowany. Jeżeli chcesz się wylogować i zalogować na inne konto, kliknij:<br><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" style="float:center;">Wyloguj się</a></h2>
									<?php if (\core\RoleUtils::inRole("admin")) {?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
adminview" class="button primary fit">Panel kontrolny administratora</a>
									<?php }?>
									<?php if (\core\RoleUtils::inRole("wlasciciel")) {?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
profil" class="button primary fit">Profil właściciela</a>
									<?php }?>
									<?php if (\core\RoleUtils::inRole("weterynarz")) {?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
profilvet" class="button primary fit">Profil weterynarza</a>
									<?php }?>

								<?php } else { ?>	
									
								

										<!-- FORMULARZ LOGOWANIA -->

								<div>
									<h2>Zaloguj się</h2>
									<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">
										
											<div style="width: 30%; margin: 0 auto; clear: right; ">
												<input type="text" name="login" id="demo-name" value="" placeholder="Login" />
											</div>
											<div style="width: 30%; margin: 0 auto; clear: right;  margin-top: 20px;">
												<input type="password" name="password" id="demo-name" value="" placeholder="Hasło" />
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
											<input type="submit" value="Zaloguj" class="primary" style="margin-top: 30px;"/>
											
									</form>
								</div>

								


										<!-- OPCJA WYBORU REJESTRACJI -->

							<div>
								

								

										<!-- FORMULARZ REJESTRACJI -->

								<div id="regwlasciciel">
									<h2>Rejestracja</h2>




									<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerSave">
											
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
															<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kliniki']->value, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value["idKlinika"];?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value["Nazwa"];?>
</option>
															<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
															
														</select>
													</div>



												</span>




											
											</div>
											
											<input type="submit" value="Zarejestruj" class="primary" style="margin-top: 30px;"/>
									</form>




								</div>




										

							</div>

							<?php }?>
							</section>

					</div>

<?php
}
}
/* {/block 'top'} */
}
