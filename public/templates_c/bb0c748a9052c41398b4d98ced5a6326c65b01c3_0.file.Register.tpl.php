<?php
/* Smarty version 3.1.33, created on 2019-09-03 10:20:13
  from 'C:\xampp\htdocs\amelia\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6e223d80bca9_71202602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb0c748a9052c41398b4d98ced5a6326c65b01c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\Register.tpl',
      1 => 1567498803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6e223d80bca9_71202602 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13161338955d6e223d7e8a28_80956531', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_14360863435d6e223d7f45a0_00697038 extends Smarty_Internal_Block
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
class Block_13161338955d6e223d7e8a28_80956531 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13161338955d6e223d7e8a28_80956531',
  ),
  'messages' => 
  array (
    0 => 'Block_14360863435d6e223d7f45a0_00697038',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 

    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>				
        <p> 
        <div class="bottom-margin">
            <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post">
                <h2>Zarejestruj się</h2>
                <fieldset>
                    <label for="name">Email</label>
                    <input type="text" placeholder="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
"/><br />
					
                    <label for="name">Imię</label>
                    <input type="text" placeholder="imię" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
"/><br />

                    <label for="surname">Nazwisko</label>
                    <input type="text" placeholder="nazwisko" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
" ><br />
                    
                    <label for="login">Login</label>
                    <input type="text" placeholder="login" name="login"  value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/><br />

                    <label for="password">Hasło</label>
                    <input type="password" placeholder="hasło" name="password" /><br />

                    <label for="password_repeat">Powtórz hasło</label>
                    <input type="password" placeholder="hasło" name="password_repeat""/><br />

                    <button type="submit" class="pure-button pure-button-primary">Zarejestruj</button>

                </fieldset>
            </form>
        </div>	
    </p>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14360863435d6e223d7f45a0_00697038', 'messages', $this->tplIndex);
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
