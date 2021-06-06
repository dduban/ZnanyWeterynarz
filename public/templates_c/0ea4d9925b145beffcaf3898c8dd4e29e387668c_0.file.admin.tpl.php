<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 14:20:53
  from 'C:\xampp\htdocs\znanyweterynarz\app\views\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efdd125aab9c2_66349267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ea4d9925b145beffcaf3898c8dd4e29e387668c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\znanyweterynarz\\app\\views\\admin.tpl',
      1 => 1593692451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efdd125aab9c2_66349267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9304184975efdd125a9e775_62333508', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_9304184975efdd125a9e775_62333508 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_9304184975efdd125a9e775_62333508',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


				<!-- Header -->
					<header id="header">
						<h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
admin" >Panel administracyjny</a></h1>
					</header>

				<!-- Main -->
					<div id="main">

							<section id="content" class="main">
								<span class="image main"><img src="images/picadm.jpg" alt="" />

									<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" style="float:right;">Wyloguj się</a>
									<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
profil" style="float:right;">Profil</a>
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
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['toaccept']->value, 'toa');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['toa']->value) {
?>
													<tr><td><?php echo $_smarty_tpl->tpl_vars['toa']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['toa']->value["imie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['toa']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['toa']->value["telefon"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['toa']->value["Nazwa"];?>
</td><td><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
vetAccept/<?php echo $_smarty_tpl->tpl_vars['toa']->value['idUser'];?>
">Akceptuj</a><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
vetDelete/<?php echo $_smarty_tpl->tpl_vars['toa']->value['idUser'];?>
">Odrzuć</a></td></tr>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													
												</tbody>
												
											</table>
										</div>

										<div style="background: #46e88f; text-align:center; color:white; padding-top: 10px; padding-bottom:10px; font-weight: bold;">
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
										</div>


										

									

							</section>
							


					</div>


<?php
}
}
/* {/block 'top'} */
}
