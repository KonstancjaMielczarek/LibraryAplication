{extends file="main.tpl"}
{block name=content} 

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <p> 

        <div class="bottom-margin">
            <form action="{$conf->action_root}newGenre#intro" method="post" class="pure-form pure-form-aligned">
                <input type="hidden" name="form" value="true">
                <h2>Dodaj nowy gatunek książki</h2>
                <fieldset>

                    <div class="pure-control-group">
                        <label for="genre">Gatunek</label>
                        <input id="genre" type="text" placeholder="gatunek" name="genre" value="{$form->genre}">
                    </div></br></br>
                    <div class="pure-controls">
                       <!-- <input type="submit" class="pure-button pure-button-primary" value="Dodaj"/> -->
						<button type="submit" class="pure-button pure-button-primary">Dodaj</button>

                    </div>
                </fieldset>
                <input type="hidden" name="id" value="{isset($form->id_genre)}">
            </form>	
        </div>

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
	
	    <table id="tab_genre" class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th>gatunek</th>
                <th>opcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $genreRecords as $r}
                {strip}
                    <tr>
                        <td>{$r["genre"]}</td>
                        <td>
                            <a class="button-small pure-button button-warning" href="{$conf->action_url}deleteGenre/{$r['id_genre']}">Usuń</a>
                        </td>
                    </tr>
                {/strip}
            {/foreach}
        </tbody>
    </table>	
           <a class="pure-button pure-button-primary" href="{$conf->action_root}home#intro">Powrót do strony głównej</a>
		   
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