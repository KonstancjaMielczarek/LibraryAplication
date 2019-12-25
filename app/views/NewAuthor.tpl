{extends file="main.tpl"}
{block name=content} 

    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <p> 

        <div class="bottom-margin">
            <form action="{$conf->action_root}newAuthor#intro" method="post" class="pure-form pure-form-aligned">
			    <input type="hidden" name="form" value="true">
                <fieldset>
                <h2>Dodaj nowego autora</h2>
                    <div class="pure-control-group">
                        <label for="author">Autor</label>
                        <input id="author" type="text" placeholder="autor" name="author" value="{$form->author}">
                    </div></br></br>
                    <div class="pure-controls">
						<button type="submit" class="pure-button pure-button-primary">Dodaj</button>

                    </div>
                </fieldset>
                <input type="hidden" name="id" value="{isset($form->id_author)}">
            </form>	
        </div>

    </p>
	
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
	</br></br>
	
	
    <table id="tab_" class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th>autor</th>
                <th>opcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $authorRecords as $a}
                {strip}
                    <tr>
                        <td>{$a["author"]}</td>
                        <td>
                            <a class="button-small pure-button button-warning" href="{$conf->action_url}deleteGenre/{$a['id_author']}">Usuń</a>
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