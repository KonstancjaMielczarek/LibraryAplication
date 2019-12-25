<?php
/* Smarty version 3.1.33, created on 2019-09-10 11:29:30
  from 'C:\xampp\htdocs\amelia\app\views\NewAuthor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d776cfab589c5_31473511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8c3b3b886314ba15d694a49e1c862fa571a2240' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\NewAuthor.tpl',
      1 => 1568107749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d776cfab589c5_31473511 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19258031295d776cfab318c0_82449221', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_12053124375d776cfab50cc2_55727121 extends Smarty_Internal_Block
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
class Block_19258031295d776cfab318c0_82449221 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19258031295d776cfab318c0_82449221',
  ),
  'messages' => 
  array (
    0 => 'Block_12053124375d776cfab50cc2_55727121',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 

    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <p> 

        <div class="bottom-margin">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
newAuthor#intro" method="post" class="pure-form pure-form-aligned">
			    <input type="hidden" name="form" value="true">
                <fieldset>
                <h2>Dodaj nowego autora</h2>
                    <div class="pure-control-group">
                        <label for="author">Autor</label>
                        <input id="author" type="text" placeholder="autor" name="author" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->author;?>
">
                    </div></br></br>
                    <div class="pure-controls">
						<button type="submit" class="pure-button pure-button-primary">Dodaj</button>

                    </div>
                </fieldset>
                <input type="hidden" name="id" value="<?php echo isset($_smarty_tpl->tpl_vars['form']->value->id_author);?>
">
            </form>	
        </div>

    </p>
	
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
	</br></br>
	
	
    <table id="tab_" class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th>autor</th>
                <th>opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorRecords']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?>
                <tr><td><?php echo $_smarty_tpl->tpl_vars['a']->value["author"];?>
</td><td><a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteGenre/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_author'];?>
">Usuń</a></td></tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
	
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12053124375d776cfab50cc2_55727121', 'messages', $this->tplIndex);
?>

	           <a class="pure-button pure-button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home#intro">Powrót do strony głównej</a>
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
