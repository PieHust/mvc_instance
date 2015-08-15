<?php /* Smarty version Smarty-3.1.16, created on 2015-08-15 22:22:27
         compiled from "tpl\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1267155cf421eeae136-83142775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '582ec9b926802535936711aced7500a86e7634d9' => 
    array (
      0 => 'tpl\\index\\index.html',
      1 => 1439648277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1267155cf421eeae136-83142775',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55cf421f20eb88_93456414',
  'variables' => 
  array (
    'data' => 0,
    'news' => 0,
    'about' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55cf421f20eb88_93456414')) {function content_55cf421f20eb88_93456414($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>有一新闻</title>
</head>
<style type="text/css">
	*{
		padding: 0px;
		margin: 0px;

	}

	.nav{
		background: lightgreen;
		width: 100%;
		height: 200px;

	}
	.nav ul{
		background: black;
		color: white;
		overflow: hidden;


	}
	.nav li{
		float: left;
		list-style: none;
		line-height: 45px;
		margin-left: 10%;
	}
	.nav .spe{
		margin-left:5%;
	}
	a{
		text-decoration: none;
		color: inherit;
		font-weight: bolder;
		text-shadow: 0 0 4px #fc6;
	}
	.content{
		width: 80%;
		margin: 0 auto;
		box-shadow: 0 0 10px lightgreen;
		padding-bottom: 40px;
		z-index: 3;
		position: absolute;
		background: white;
		top:150px;
		left:50%;
		margin-left: -40%;
		overflow: hidden;
	}
	.newslist{
		width: 70%;
		float: left;
		
	}
	.aboutus{
		width: 30%;
		box-sizing: border-box;
		border-left: 4px solid lightgray;
		height: 300px;
		float: left;
		margin-top: 40px;
		padding: 10px;
	}
	.list{
		width: 80%;
		margin: 40px auto;
		border: 1px dotted #ccc;
		padding: 10px;
	}
	.list h3{
		line-height: 30px;
		font-size: 18px;
	}
	.list span{
		border-left:1px solid #ccc;
		padding: 0 5px;
		font-size: 14px;
		color: #ccc;
	}
	.list p{
		text-indent: 2em;
		padding: 20px;
		font-size: 14px;
	}
</style>
<body>
	<div class="nav">
		<ul>
			<li><a href=''>首页</a></li>
			<li class='spe'><a href='#'>关于我们</a></li>
		</ul>
		<p style='color:white;font-size: 30px;margin-top:30px;margin-left:10%;'><b>有一新闻 第一个php mvc实例</b></p>
	</div>
	<div class="content">
		<div class='newslist'>
		<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
			<div class="list">
				<h3><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</h3>
				<span>作者:<?php echo $_smarty_tpl->tpl_vars['news']->value['author'];?>
</span><span>:<?php echo $_smarty_tpl->tpl_vars['data']->value['dateline'];?>
</span>
				<p><?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>
</p>
				<a href='index.php?controller=index&method=newsshow&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
' style="color:orange;text-shadow: none;">阅读更多</a>
			</div>
		<?php } ?>
		</div>
		<div class='aboutus'>
			<h3>关于我们</h3>
			<p><?php echo $_smarty_tpl->tpl_vars['about']->value;?>
</p>
		</div>
	</div>
</body>
</html><?php }} ?>
