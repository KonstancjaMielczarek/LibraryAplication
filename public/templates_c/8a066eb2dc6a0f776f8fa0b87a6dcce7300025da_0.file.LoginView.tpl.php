<?php
/* Smarty version 3.1.33, created on 2019-07-25 19:41:18
  from 'C:\xampp\htdocs\amelia\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d39e9be8959c0_37661504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a066eb2dc6a0f776f8fa0b87a6dcce7300025da' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\LoginView.tpl',
      1 => 1564076474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d39e9be8959c0_37661504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12397065595d39e9be866bb2_81703418', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_2864551615d39e9be8765b2_77765577 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
            <div class="messages bottom-margin">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                        <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        <?php }?>

    <?php
}
}
/* {/block 'messages'} */
/* {block 'content'} */
class Block_12397065595d39e9be866bb2_81703418 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12397065595d39e9be866bb2_81703418',
  ),
  'messages' => 
  array (
    0 => 'Block_2864551615d39e9be8765b2_77765577',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 

    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <p> 

        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login#intro" method="post" class="pure-form pure-form-aligned bottom-margin">
            <h4>Zaloguj się</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" />
                </div>
                <div class="pure-control-group">
                    <label for="id_password">Hasło: </label>
                    <input id="id_password" type="password" name="password" /><br />
                </div>
                <div class="pure-controls">
					<button class="btn btn-action" type="submit">Zaloguj</button>
                </div></br>
                <div class="pure-controls">
                <b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register#intro">Utwórz konto</a></b>
                <b><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home#intro">Strona główna</a></b>
                </div>
            </fieldset>
        </form>		

    </p>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2864551615d39e9be8765b2_77765577', 'messages', $this->tplIndex);
?>

</section>

<!-- Items -->
<section class="main items">
    <article class="item">
        <header>
            <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/pic01.jpg" alt="" /></a>								
        </header>
    </article>
    <article class="item">
        <header>
            <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->images;?>
/pic02.jpg" alt="" /></a>
        </header>
    </article>

</section>

<?php
}
}
/* {/block 'content'} */
}
