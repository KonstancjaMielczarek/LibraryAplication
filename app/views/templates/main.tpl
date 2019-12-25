<!DOCTYPE HTML>
<html>
	<head>
		<title>Biblioteka</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{$conf->css}/main.css" />
	</head>
	<body>
	
			<!-- Header -->
			<header id="header" class="alt">
				<div class="inner">
					<h1>Biblioteka</h1>
					<p>Wypożyczaj książki kiedy chcesz</p>
				</div>
			</header>



			<div class="wrapper">

    <table id="tab_book" class="pure-table pure-table-bordered" bgcolor="#d3d3d3">
        <thead>
            <tr>				
			<td><b><a href="{$conf->action_root}home#intro" class="pure-menu-heading pure-menu-link">Strona główna</a></td>
			<td><b><a href="{$conf->action_root}basket#intro" class="pure-menu-heading pure-menu-link">Koszyk</a></td>
			{if !core\RoleUtils::inRole("logged")}
				<td><b><a href="{$conf->action_root}login#intro">Zaloguj</a></td>
                                <td><b><a class="pure-menu-heading pure-menu-link" href="{$conf->action_root}register#intro">Rejestracja</a></li>
			{/if}

            {if core\RoleUtils::inRole("admin")}
				 <td><b><a href="{$conf->action_root}new#intro" class="pure-menu-heading pure-menu-link">+Nowa książka</a></td>
                 <td><b><a href="{$conf->action_root}newGenre#intro">+Nowy gatunek</a></td>
                 <td><b><a href="{$conf->action_root}newAuthor#intro">+Nowy autor</a></td>
			{/if}
			
            {if core\RoleUtils::inRole("logged")}
                 <td><b><a href="{$conf->action_root}logout#intro">Wyloguj</a></td>
			{/if}
                    </tr>
        </thead>
    </table>			
			
				
			</div>

	{block name=content} {/block}
	{block name=messages} {/block}

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; Untitled. All rights reserved.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="{$conf->js}/jquery.min.js"></script>
			<script src="{$conf->js}/skel.min.js"></script>
			<script src="{$conf->js}/util.js"></script>
			<script src="{$conf->js}/main.js"></script>

	</body>
</html>