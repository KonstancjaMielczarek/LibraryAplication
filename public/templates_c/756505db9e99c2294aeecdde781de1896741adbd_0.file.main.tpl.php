<?php
/* Smarty version 3.1.33, created on 2019-09-03 14:34:10
  from 'C:\xampp\htdocs\amelia\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6e5dc29b0aa9_22137070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '756505db9e99c2294aeecdde781de1896741adbd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\templates\\main.tpl',
      1 => 1567514037,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6e5dc29b0aa9_22137070 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Biblioteka</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->css;?>
/main.css" />
	</head>
	<body>
	
			<!-- Header -->
			<header id="header" class="alt">
				<div class="inner">
					<h1>Biblioteka</h1>
					<p>Wypożyczaj książki kiedy chcesz</p>
				</div>
			</header>



			<div class="wrapper">

    <table id="tab_book" class="pure-table pure-table-bordered" bgcolor="#d3d3d3">
        <thead>
            <tr>				
			<td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home#intro" class="pure-menu-heading pure-menu-link">Strona główna</a></td>
			<td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
basket#intro" class="pure-menu-heading pure-menu-link">Koszyk</a></td>
			<?php if (!core\RoleUtils::inRole("logged")) {?>
				<td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login#intro">Zaloguj</a></td>
                                <td><b><a class="pure-menu-heading pure-menu-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register#intro">Rejestracja</a></li>
			<?php }?>

            <?php if (core\RoleUtils::inRole("admin")) {?>
				 <td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
new#intro" class="pure-menu-heading pure-menu-link">+Nowa książka</a></td>
                 <td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
newGenre#intro">+Nowy gatunek</a></td>
                 <td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
newAuthor#intro">+Nowy autor</a></td>
			<?php }?>
			
            <?php if (core\RoleUtils::inRole("logged")) {?>
                 <td><b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout#intro">Wyloguj</a></td>
			<?php }?>
                    </tr>
        </thead>
    </table>			
			
				
			</div>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7628262515d6e5dc29a8da2_25739450', 'content');
?>

	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9867179165d6e5dc29acc27_78482583', 'messages');
?>


				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; Untitled. All rights reserved.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->js;?>
/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->js;?>
/skel.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->js;?>
/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->js;?>
/main.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
/* {block 'content'} */
class Block_7628262515d6e5dc29a8da2_25739450 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7628262515d6e5dc29a8da2_25739450',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
/* {block 'messages'} */
class Block_9867179165d6e5dc29acc27_78482583 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_9867179165d6e5dc29acc27_78482583',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'messages'} */
}
