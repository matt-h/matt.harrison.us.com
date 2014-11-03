<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{$title}</title>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/style_{$csssha}.css">
<meta name="description" content="{$description}">
</head>
<body>
<header id="header">
	<hgroup>
		<h1 id="site-title"><a href="/" title="Matt" rel="home">Matt</a></h1>
		<h2 id="site-description">Geek, Coder, Reader, Gamer</h2>
	</hgroup>


	<nav id="mainmenu" role="navigation">
		<h3 class="assistive-text">Main menu</h3>
		<div class="skip-link"><a class="assistive-text" href="#content" title="Skip to primary content">Skip to primary content</a></div>
		<ul id="menu">
			<li><a href="/" title="Home">Home</a></li>
			<li><a href="/about.html">About</a></li>
			<li><a href="/license.html">License</a></li>
			<li><a href="/projects.html">Projects</a></li>
		</ul>
	</nav>
</header>


<div id="content" role="main">
{if $next_previous_block}
<nav class="pnnav">
	<h3 class="assistive-text">Post navigation</h3>
	{if $have_previous}
	<span class="nav-previous"><a href="{$prevurl}" rel="prev"><span class="meta-nav">&larr;</span> Previous</a></span>
	{/if}
	{if $have_next}
	<span class="nav-next"><a href="{$nexturl}" rel="next">Next <span class="meta-nav">&rarr;</span></a></span>
	{/if}
</nav>
{/if}
{block name="content"}Content goes here{/block}
{if $next_previous_block}
<nav class="pnnav">
	<h3 class="assistive-text">Post navigation</h3>
	{if $have_previous}
	<span class="nav-previous"><a href="{$prevurl}" rel="prev"><span class="meta-nav">&larr;</span> Previous</a></span>
	{/if}
	{if $have_next}
	<span class="nav-next"><a href="{$nexturl}" rel="next">Next <span class="meta-nav">&rarr;</span></a></span>
	{/if}
</nav>
{/if}
</div>

<footer id="colophon" role="contentinfo">

</footer>

</body>
</html>
