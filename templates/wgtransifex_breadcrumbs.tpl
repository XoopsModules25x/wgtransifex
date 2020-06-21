<ol class='breadcrumb'>
	<li class='bc-item'><a href='<{xoAppUrl index.php}>' title='home'><i class="glyphicon glyphicon-home"></i></a></li>
	<{foreach item=itm from=$xoBreadcrumbs name=bcloop}>
	<li class='bc-item'>
		<{if $itm.link}>
			<a href='<{$itm.link}>' title='<{$itm.title}>'><{$itm.title}></a>
		<{else}>
			<{$itm.title}>
		<{/if}>
	</li>
	<{/foreach}>
</ol>
