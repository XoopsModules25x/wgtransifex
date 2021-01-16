<!-- Header -->
<{include file='db:wgtransifex_admin_header.tpl' }>


<style>
	.modal {
		z-index:1;
		display:none;
		padding-top:10px;
		position:fixed;
		left:0;
		top:0;
		width:100%;
		height:100%;
		overflow:auto;
		background-color:rgb(0,0,0);
		background-color:rgba(0,0,0,0.8)
	}
	.modal-content{
		margin: 5% 25%;
		display: block;
		position: absolute;
	}
	.modal-hover-opacity {
		opacity:1;
		filter:alpha(opacity=100);
		-webkit-backface-visibility:hidden
	}

	.modal-hover-opacity:hover {
		opacity:0.60;
		filter:alpha(opacity=60);
		-webkit-backface-visibility:hidden
	}
	.close {
		text-decoration:none;float:right;font-size:24px;font-weight:bold;color:white
	}
	.modal-content {
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
	from {-webkit-transform:scale(0)}
	to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
	from {transform:scale(0)}
	to {transform:scale(1)}
	}

	.wgt-admin-card {
		border: 1px solid #ccc;
		width: 200px;
		margin:5px;
		padding:0;
		display:inline-block;
	}
	.wgt-admin-card p {
		text-align:center;
	}
	.wgt-admin-card-img {
		border: 1px solid #ccc !important;
		width: 190px;
		margin: 5px;
	}
	.wgt-admin-github {
		margin: 0 0 25px 0;
		padding-top:20px;
		padding-bottom:20px;
		border-top: 1px solid #4e5159;
		border-bottom: 1px solid #4e5159;
	}
	.wgt-admin-btn {
		border: 1px solid #ccc;
		padding:8px;
		border-radius:5px;
	}
</style>

<{if $images_list}>
	<div class="wgt-admin-github">
	<h4 class="wgt-admin-title"><{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_GH_TITLE}></h4>
	<p><{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_GH_INFO}></p>
	<{if $activeWgGithub}>
			<p><{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_GH_FOUND}>: <a class="wgt-admin-btn" href="moduleimages.php?op=github"><img src="<{$modPathIcon16}>github.png" alt="<{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_GH_DLOAD}>"><{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_GH_DLOAD}></a></p>
		<{else}>
			<p><{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_GH_NOTFOUND}></p>
		<{/if}>
	</div>
	<h4><{$smarty.const._AM_WGTRANSIFEX_MODULEIMAGES_UPLOADS}></h4>
	<{foreach item=image from=$images_list}>
	<div class="wgt-admin-card">
		<img class="wgt-admin-card-img" src="<{$wgtransifex_upload_url_logos}>/<{$image.src}>" style="cursor:pointer"
				onclick="onClick(this)" class="modal-hover-opacity" alt="<{$image.name}>">
		<p><{$image.name}></p>
		<p>
			<{$image.width}> x <{$image.height}><a href="moduleimages.php?op=delete&img_name=<{$image.name}>" title="<{$smarty.const._DELETE}>"><img class="pull-right" src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>"></a>
		</p>

	</div>
	<{/foreach}>

<{/if}>

<{if $form}>
	<{$form}>
<{/if}>
<{if $error}>
	<div class="errorMsg"><strong><{$error}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:wgtransifex_admin_footer.tpl' }>


<div class="clear"></div>
<div id="modal01" class="modal" onclick="this.style.display='none'">
	<span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	<div class="modal-content">
		<img id="img01" class="modal-img" style="max-width:100%">
	</div>
</div>

<script>
	function onClick(element) {
		document.getElementById("img01").src = element.src;
		document.getElementById("modal01").style.display = "block";
	}
</script>
