{extends file="main.tpl"}
{block name=content} 


    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>				
        <p> 

        <div class="bottom-margin">
            <form action="{$conf->action_root}new" method="post" class="pure-form pure-form-aligned">
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
						{foreach $authorRec as $a}
						<option value="{$a["id_author"]}">{$a["author"]}</option>
						{/foreach}
					</select><br />					
					

					<label for="operation2">Gatunek: </label>					
					<select name="genre">
						<option value="brak">--Gatunki--</option>
						{foreach $genreRec as $g}
						<option value="{$g["id_genre"]}">{$g["genre"]}</option>
						{/foreach}
					</select><br />				
										
					
                    <div class="pure-control-group">
                        <label for="summary">Opis</label>
					<textarea rows="6" cols="50" id="summary" type="text" placeholder="opis" name="summary"> </textarea>
                    </div></br></br>
                    <div class="pure-controls">
                        <input type="submit" class="pure-button pure-button-primary" value="Dodaj"/>

                    </div>
                </fieldset>
                <input type="hidden" name="id" value="{isset($form->id_book)}">
            </form>	
           <a class="pure-button pure-button-primary" href="{$conf->action_root}home#intro">Powrót do strony głównej</a>
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