<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 登陆验证
*/
Class CommonController extends Controller{
	Public function _initialize(){
		if (!isset($_SESSION['uid'])) {
			$this->redirect('/Home/Login/index');
		}
	}
}
 ?>