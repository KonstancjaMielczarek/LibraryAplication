{extends file="main.tpl"}
{block name=content} 

    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>					
        <p> 
        <div class="bottom-margin">
            <form class="pure-form pure-form-stacked" action="{$conf->action_url}home">
                <h2>Opcje wyszukiwania</h2>
                <fieldset>
                    <input type="text" placeholder="tytuł" name="title" value="{$form->title}"/><br />
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
				{if core\RoleUtils::inRole("admin")}
                <th>opcje</th>
				{/if}
            </tr>
        </thead>
        <tbody>
            {foreach $book as $b}
                {strip}
                    <tr>
                        <td>{$b["title"]}</td>
                        <td>{$b["author"]}</td>
                        <td>{$b["genre"]}</td>
                        <td>{$b["summary"]}</td>
                        <td>
						{if core\RoleUtils::inRole("admin")}
                            <a class="button-small pure-button button-secondary" href="{$conf->action_url}addToBasket/{$b['id_book']}#intro">Dodaj do koszyka</a></br>

                            <a class="button-small pure-button button-secondary" href="{$conf->action_url}edit/{$b['id_book']}">Edytuj</a></br>
                            &nbsp;
                            <a class="button-small pure-button button-warning" href="{$conf->action_url}deleteBook/{$b['id_book']}">Usuń</a>
							{/if}
                        </td>
                    </tr>
                {/strip}
            {/foreach}
        </tbody>
    </table>
    {block name=messages}

        {if $msgs->isMessage()}
            <div class="messages bottom-margin">
                <ul>
                    {foreach $msgs->getMessages() as $msg}
                        {strip}
                            <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                            {/strip}
                        {/foreach}
                </ul>
            </div>
        {/if}

    {/block}						
</p>
</section>

<section id="cta" class="main special" style="margin-bottom: 2em;">
    <a class="button big" href="{$conf->action_url}home?page=1#main">|<</a>
	{if $previous_page > 0}
    <a class="button big" href="{$conf->action_url}home?page={$p-1}#main"><</a>
	{/if}
    <a class="button big" href="{$conf->action_url}home?page={$p}#main">{$p}</a>
	{if $isNextPage}
    <a class="button big" href="{$conf->action_url}home?page={$p+1}#main">{$p+1}</a>
    <a class="button big" href="{$conf->action_url}home?page={$p+2}#main">{$p+2}</a>
    <a class="button big" href="{$conf->action_url}home?page={$next_page}#main">></a>
    {*<a class="button big" href="{$conf->action_url}home?page=1">>|</a>*}
	{/if}
</section>

<!-- Items -->
<section class="main items">
    <article class="item">
        <header>
            <a href="#"><img src="{$conf->images}/pic01.jpg" alt="" /></a>								
        </header>
    </article>
    <article class="item">
        <header>
            <a href="#"><img src="{$conf->images}/pic02.jpg" alt="" /></a>
        </header>
    </article>

</section>


{/block}