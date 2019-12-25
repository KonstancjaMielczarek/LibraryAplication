{extends file="main.tpl"}
{block name=content} 

    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>
        <p> 

        <form action="{$conf->action_root}login#intro" method="post" class="pure-form pure-form-aligned bottom-margin">
            <h4>Zaloguj się</h4>
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" />
                </div>
                <div class="pure-control-group">
                    <label for="id_password">Hasło: </label>
                    <input id="id_password" type="password" name="password" /><br />
                </div>
                <div class="pure-controls">
					<button class="btn btn-action" type="submit">Zaloguj</button>
                </div></br>
                <div class="pure-controls">
                <b><a href="{$conf->action_root}register#intro">Utwórz konto</a></b>
                <b><a href="{$conf->action_root}home#intro">Strona główna</a></b>
                </div>
            </fieldset>
        </form>		

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