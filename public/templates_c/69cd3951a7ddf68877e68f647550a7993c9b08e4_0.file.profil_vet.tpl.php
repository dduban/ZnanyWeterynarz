<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-28 10:43:33
  from 'C:\xampp\htdocs\znanyweterynarz\app\views\profil_vet.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef85835010583_75397824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69cd3951a7ddf68877e68f647550a7993c9b08e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\znanyweterynarz\\app\\views\\profil_vet.tpl',
      1 => 1593332930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef85835010583_75397824 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20759088875ef858350080f6_41143529', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_20759088875ef858350080f6_41143529 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_20759088875ef858350080f6_41143529',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


				<!-- Header -->
					<header id="header">
						<h1>Profil</h1>
						<p>PANEL LEKARZA WETERYNARII</p>
					</header>

				<!-- Main -->
					<div id="main">

							<section id="content" class="main">
								<span class="image main"><img src="images/picvet.jpg" alt="" /></span>
								<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" style="float:right;">Wyloguj się</a>
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
													<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wizyty']->value, 'w');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
?>
													<tr><td><?php echo $_smarty_tpl->tpl_vars['w']->value["data"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["godzina"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["imie"];?>
 <?php echo $_smarty_tpl->tpl_vars['w']->value["nazwisko"];?>
</td><td><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wizytaDelete/<?php echo $_smarty_tpl->tpl_vars['w']->value['idSpotkanie'];?>
">Odwołaj</a></td></tr>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													
												</tbody>
												
											</table>
										</div>
							</section>


					</div>


<?php
}
}
/* {/block 'top'} */
}
