{extends file="main.tpl"}
{block name=content} 

    <!-- Wrapper -->

    <!-- Banner -->
    <section id="intro" class="main">
        <span class="icon fa-diamond major"></span>				
        <p> 
        <div class="bottom-margin">
            <form class="pure-form pure-form-stacked" action="{$conf->action_root}register#intro" method="post">
                <h2>Zarejestruj się</h2>
                <fieldset>
                    <label for="name">Email</label>
                    <input type="text" placeholder="email" name="email" value="{$form->email}"/><br />
					
                    <label for="name">Imię</label>
                    <input type="text" placeholder="imię" name="name" value="{$form->name}"/><br />

                    <label for="surname">Nazwisko</label>
                    <input type="text" placeholder="nazwisko" name="surname" value="{$form->surname}" ><br />
                    
                    <label for="login">Login</label>
                    <input type="text" placeholder="login" name="login"  value="{$form->login}"/><br />

                    <label for="password">Hasło</label>
                    <input type="password" placeholder="hasło" name="password" /><br />

                    <label for="password_repeat">Powtórz hasło</label>
                    <input type="password" placeholder="hasło" name="password_repeat""/><br />

                    <button type="submit" class="pure-button pure-button-primary">Zarejestruj</button>

                </fieldset>
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