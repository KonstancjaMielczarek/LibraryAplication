{extends file="main.tpl"}
{block name=content} 


    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <!-- <h2>Lista książek</h2>	-->					
        <p> 

        <div class="bottom-margin">
            <form action="{$conf->action_root}edit" method="post" class="pure-form pure-form-aligned">
                <fieldset>
                <h2>{$page_title}</h2>
                    <div class="pure-control-group">
                        <label for="title">Tytuł</label>
                        <input id="title" type="text" placeholder="tytuł" name="title" value="{$record['title']}">
                    </div></br>
                    <div class="pure-control-group">
                        <label for="author">Autor</label>
                        <input id="author" type="text" placeholder="autor" name="author" value="{$record['author']}">
                    </div></br>
                    <div class="pure-control-group">
                        <label for="genre">Gatunek</label>
                        <input id="genre" type="text" placeholder="gatunek" name="genre" value="{$record['genre']}">
                    </div></br>
                    <div class="pure-control-group">
                        <label for="summary">Opis</label>
<textarea rows="6" cols="50" id="summary" type="text" placeholder="opis" name="summary"> {$record['summary']}</textarea>
                    </div></br></br>
                    <div class="pure-controls">
                        <input type="submit" class="pure-button pure-button-primary" value="Zapisz zmiany"/>

                    </div>

                <input type="hidden" name="id_genre" value="{$record['id_genre']}">
                <input type="hidden" name="id_author" value="{$record['id_author']}">
                <input type="hidden" name="id_book" value="{$record['id_book']}">
                </fieldset>
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