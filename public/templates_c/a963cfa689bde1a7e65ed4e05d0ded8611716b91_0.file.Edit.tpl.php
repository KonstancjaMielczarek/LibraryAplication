<?php
/* Smarty version 3.1.33, created on 2019-08-31 13:35:36
  from 'C:\xampp\htdocs\amelia\app\views\Edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6a5b88e2b240_84338610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a963cfa689bde1a7e65ed4e05d0ded8611716b91' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\Edit.tpl',
      1 => 1567251165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6a5b88e2b240_84338610 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14520354235d6a5b889a6d32_28535135', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_18000079785d6a5b88aa8a71_86423208 extends Smarty_Internal_Block
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
class Block_14520354235d6a5b889a6d32_28535135 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14520354235d6a5b889a6d32_28535135',
  ),
  'messages' => 
  array (
    0 => 'Block_18000079785d6a5b88aa8a71_86423208',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 


    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <!-- <h2>Lista książek</h2>	-->					
        <p> 

        <div class="bottom-margin">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
edit" method="post" class="pure-form pure-form-aligned">
                <fieldset>
                <h2><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h2>
                    <div class="pure-control-group">
                        <label for="title">Tytuł</label>
                        <input id="title" type="text" placeholder="tytuł" name="title" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
">
                    </div></br>
                    <div class="pure-control-group">
                        <label for="author">Autor</label>
                        <input id="author" type="text" placeholder="autor" name="author" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['author'];?>
">
                    </div></br>
                    <div class="pure-control-group">
                        <label for="genre">Gatunek</label>
                        <input id="genre" type="text" placeholder="gatunek" name="genre" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['genre'];?>
">
                    </div></br>
                    <div class="pure-control-group">
                        <label for="summary">Opis</label>
<textarea rows="6" cols="50" id="summary" type="text" placeholder="opis" name="summary"> <?php echo $_smarty_tpl->tpl_vars['record']->value['summary'];?>
</textarea>
                    </div></br></br>
                    <div class="pure-controls">
                        <input type="submit" class="pure-button pure-button-primary" value="Zapisz zmiany"/>

                    </div>

                <input type="hidden" name="id_genre" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['id_genre'];?>
">
                <input type="hidden" name="id_author" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['id_author'];?>
">
                <input type="hidden" name="id_book" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['id_book'];?>
">
                </fieldset>
            </form>	
           <a class="pure-button pure-button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home#intro">Powrót do strony głównej</a>
        </div>

    </p>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18000079785d6a5b88aa8a71_86423208', 'messages', $this->tplIndex);
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
