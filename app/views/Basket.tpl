{extends file="main.tpl"}
{block name=content} 

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
                {foreach $book as $b}
                    {strip}
                        <tr>
                            <td>{$b["title"]}</td>
                            <td>{$b["author"]}</td>
                            <td>{$b["genre"]}</td>
                            <td>

                                <a class="button-small pure-button button-warning" href="{$conf->action_url}basketDelete/{$b['id_book']}#intro">Usuń</a>
                            </td>
                        </tr>

                    {/strip}
                {/foreach}
            </tbody>
        </table>
        <a class="pure-button pure-button-primary" href="{$conf->action_root}home#intro">Powrót do strony głównej</a></br> 
        <a class="button-small pure-button button-warning" href="{$conf->action_root}basketSave#intro">Zamów</a></br> 
 </p>

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