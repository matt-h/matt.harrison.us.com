{extends file="template.tpl"}
{block name="content"}
<article>
	<header>
		<h1>{$h1}</h1>

		<div class="entry-meta">
		<span class="sep">Posted on </span><a href="{$url}" title="{$date}" rel="bookmark"><time datetime="{$dateraw}">{$date}</time></a>
		</div>
	</header>

	<div class="entry-content">
		{$content}
	</div>

	<footer class="entry-meta">
	This entry was posted in {$categories}. Bookmark the <a href="{$url}" title="Permalink to {$h1}" rel="bookmark">permalink</a>.
	</footer>
</article>
{/block}
