<?php
/* Smarty version 3.1.33, created on 2019-09-10 10:14:52
  from 'C:\xampp\htdocs\amelia\app\views\Home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d775b7c408ea4_89516383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a5e882829d57cc7f137f84e755d840d232eba6a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\Home.tpl',
      1 => 1568103286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d775b7c408ea4_89516383 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16994064045d775b7c3d2395_30900731', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_20792088945d775b7c3f17a4_00039647 extends Smarty_Internal_Block
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
class Block_16994064045d775b7c3d2395_30900731 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16994064045d775b7c3d2395_30900731',
  ),
  'messages' => 
  array (
    0 => 'Block_20792088945d775b7c3f17a4_00039647',
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
            <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home">
                <h2>Opcje wyszukiwania</h2>
                <fieldset>
                    <input type="text" placeholder="tytuł" name="title" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->title;?>
"/><br />
                    <button type="submit" class="pure-button pure-button-primary">Szukaj</button>
                </fieldset>
            </form>
        </div>	
    </p>
</section>

<!-- Main -->
<section id="main" class="main">
    <header>
        <h2>Lista książek</h2>
    </header>
    <p>

    <table id="tab_book" class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th>tytuł</th>
                <th>autor</th>
                <th>gatunek</th>
                <th>opis</th>
				<?php if (core\RoleUtils::inRole("admin")) {?>
                <th>opcje</th>
				<?php }?>
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
</td><td><?php echo $_smarty_tpl->tpl_vars['b']->value["summary"];?>
</td><td><?php if (core\RoleUtils::inRole("admin")) {?><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addToBasket/<?php echo $_smarty_tpl->tpl_vars['b']->value['id_book'];?>
#intro">Dodaj do koszyka</a></br><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
edit/<?php echo $_smarty_tpl->tpl_vars['b']->value['id_book'];?>
">Edytuj</a></br>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteBook/<?php echo $_smarty_tpl->tpl_vars['b']->value['id_book'];?>
">Usuń</a><?php }?></td></tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20792088945d775b7c3f17a4_00039647', 'messages', $this->tplIndex);
?>
						
</p>
</section>

<section id="cta" class="main special" style="margin-bottom: 2em;">
    <a class="button big" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home?page=1#main">|<</a>
	<?php if ($_smarty_tpl->tpl_vars['previous_page']->value > 0) {?>
    <a class="button big" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home?page=<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
#main"><</a>
	<?php }?>
    <a class="button big" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
#main"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</a>
	<?php if ($_smarty_tpl->tpl_vars['isNextPage']->value) {?>
    <a class="button big" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home?page=<?php echo $_smarty_tpl->tpl_vars['p']->value+1;?>
#main"><?php echo $_smarty_tpl->tpl_vars['p']->value+1;?>
</a>
    <a class="button big" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home?page=<?php echo $_smarty_tpl->tpl_vars['p']->value+2;?>
#main"><?php echo $_smarty_tpl->tpl_vars['p']->value+2;?>
</a>
    <a class="button big" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
home?page=<?php echo $_smarty_tpl->tpl_vars['next_page']->value;?>
#main">></a>
    	<?php }?>
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
