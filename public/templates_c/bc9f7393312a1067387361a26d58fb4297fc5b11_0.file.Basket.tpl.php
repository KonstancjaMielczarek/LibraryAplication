<?php
/* Smarty version 3.1.33, created on 2019-07-24 20:47:33
  from 'C:\xampp\htdocs\amelia\app\views\Basket.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d38a7c517e822_69887993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc9f7393312a1067387361a26d58fb4297fc5b11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\Basket.tpl',
      1 => 1563994044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d38a7c517e822_69887993 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8781454295d38a7c515b598_89322486', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_16272208255d38a7c516ee21_63275923 extends Smarty_Internal_Block
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
class Block_8781454295d38a7c515b598_89322486 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8781454295d38a7c515b598_89322486',
  ),
  'messages' => 
  array (
    0 => 'Block_16272208255d38a7c516ee21_63275923',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 

    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>		
		<h2>Twój koszyk</h2>		
        <p> 							
        <table id="tab_book" class="pure-table pure-table-bordered">
            <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Gatunek</th>
                    <th>Usuń z koszyka</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['book']->value, 'b');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['b']->value["title"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["author"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["genre"];?>
</td><td><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
basketDelete/<?php echo $_smarty_tpl->tpl_vars['b']->value['id_book'];?>
#intro">Usuń</a></td></tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <a class="pure-button pure-button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home#intro">Powrót do strony głównej</a></br> 
        <a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
basketSave#intro">Zamów</a></br> 
 </p>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16272208255d38a7c516ee21_63275923', 'messages', $this->tplIndex);
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
