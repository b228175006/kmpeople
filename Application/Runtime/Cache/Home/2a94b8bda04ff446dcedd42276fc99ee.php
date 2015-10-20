<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>人事档案</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo U('/Home/Index/index');?>">人事档案管理</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo U('/Home/Index/addpeople');?>">人事档案添加</a></li>
       <!--  <li><a href="<?php echo U('/Home/Index/index');?>">人事档案管理</a></li> -->
      </ul>
      <form class="navbar-form navbar-left" role="search" method="post" action="<?php echo U('/Home/Index/seach');?>" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="人事档案搜索" name="name">
          <select name="team" id="team" class="form-control">
           <option value="0">请选择团队</option>
           <?php if(is_array($team)): foreach($team as $key=>$v): ?><option value="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
	      </select>
        </div>
        <input type="submit" value="搜索" class="btn btn-default">
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="navbar-text"><p class="navbar-link"><kbd><?php echo (session('nikename')); ?></kbd>,欢迎登陆人事档案系统</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理 <span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="<?php echo U('/Home/Login/inspsw');?>">修改密码</a></li>
            <li <?php echo ($needadmin); ?> role="separator" class="divider"></li>
            <li <?php echo ($needadmin); ?>><a href="<?php echo U('/Home/Login/addlogin');?>">新增管理员</a></li>
            <li <?php echo ($needadmin); ?>><a href="<?php echo U('/Home/Login/alllogin');?>">管理员列表</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo U('/Home/Index/team');?>">团队设置</a></li>
          </ul>
        </li>
        <li><a href="<?php echo U('/Home/Login/loginout');?>">登出</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  	<div class="container">
  		<h1 class="text-center">昆明人事档案</h1>
  		<div class="table-responsive">
  			<table class="table table-striped table-bordered table-hover table-condensed">
  		 		<tr>
  		 			<th class="text-center">#</th>
  		 			<th class="text-center">工号</th>
  		 			<th class="text-center">姓名</th>
  		 			<th class="text-center">团队</th>
  		 			<th class="text-center">职位</th>
  		 			<th class="text-center">序列</th>
  		 			<th class="text-center">入职时间</th>
  		 			<th class="text-center">月薪</th>
  		 			<th class="text-center">性别</th>
  		 			<th class="text-center">手机</th>
  		 			<th class="text-center">操作</th>
  		 		</tr>
  		 		<?php if(is_array($people)): foreach($people as $key=>$v): ?><tr>
						<td  class="text-center">
							<!-- <input type="checkbox" name="id[]" id="id" value="<?php echo ($v["id"]); ?>"> -->
              <?php echo ($v["id"]); ?>
						</td>
						<td class="text-center"><?php echo ($v["no"]); ?></td>
						<td class="text-center"><?php echo ($v["name"]); ?></td>
						<td class="text-center"><?php echo ($v["team"]); ?></td>
						<td class="text-center"><?php echo ($v["position"]); ?></td>
						<td class="text-center"><?php echo ($v["level"]); ?></td>
						<td class="text-center"><?php echo (date("Y-m-d",$v["entrytime"])); ?></td>
						<td class="text-center"><?php echo ($v["earns"]); ?></td>
						<td class="text-center"><?php echo ($v["sex"]); ?></td>
						<td class="text-center"><?php echo ($v["tel"]); ?></td>
						<td class="text-center">
							<a href="<?php echo U('/Home/Index/inspeople',array('id'=>$v['id']));?>" class="btn btn-info">详细</a>
							<a href="<?php echo U('/Home/Index/delpeople',array('id'=>$v['id']));?>" class="btn btn-danger">删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
          <tr>
            <td colspan="11" class="text-center"><?php echo ($page); ?></td>
          </tr>
  			</table>
  		</div>
  		
  	</div>			
 	
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>