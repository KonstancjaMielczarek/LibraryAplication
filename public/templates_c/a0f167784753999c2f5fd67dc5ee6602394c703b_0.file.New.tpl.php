<?php
/* Smarty version 3.1.33, created on 2019-09-10 10:38:31
  from 'C:\xampp\htdocs\amelia\app\views\New.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d7761076ebdf4_63962736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0f167784753999c2f5fd67dc5ee6602394c703b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\New.tpl',
      1 => 1568104645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7761076ebdf4_63962736 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2908871595d7761076c8b71_73145085', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_2439260215d7761076dc3f4_26948084 extends Smarty_Internal_Block
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
class Block_2908871595d7761076c8b71_73145085 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2908871595d7761076c8b71_73145085',
  ),
  'messages' => 
  array (
    0 => 'Block_2439260215d7761076dc3f4_26948084',
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
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
new" method="post" class="pure-form pure-form-aligned">
                <fieldset>
                <h2>Dodaj nową książkę</h2>
                    <h3>Dane książki</h3>
                    <div class="pure-control-group">
                        <label for="title">Tytuł</label>
                        <input id="title" type="text" placeholder="tytuł" name="title">
                    </div>
	
	
						
					<label for="operation1">Autor: </label>					
					<select name="author">
						<option value="brak">--Autorzy--</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorRec']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['a']->value["id_author"];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value["author"];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select><br />					
					

					<label for="operation2">Gatunek: </label>					
					<select name="genre">
						<option value="brak">--Gatunki--</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genreRec']->value, 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['g']->value["id_genre"];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value["genre"];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select><br />				
										
					
                    <div class="pure-control-group">
                        <label for="summary">Opis</label>
					<textarea rows="6" cols="50" id="summary" type="text" placeholder="opis" name="summary"> </textarea>
                    </div></br></br>
                    <div class="pure-controls">
                        <input type="submit" class="pure-button pure-button-primary" value="Dodaj"/>

                    </div>
                </fieldset>
                <input type="hidden" name="id" value="<?php echo isset($_smarty_tpl->tpl_vars['form']->value->id_book);?>
">
            </form>	
           <a class="pure-button pure-button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home#intro">Powrót do strony głównej</a>
        </div>

    </p>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2439260215d7761076dc3f4_26948084', 'messages', $this->tplIndex);
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
