<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 登陆控制器
*/
class LoginController extends Controller
{
	
	//登录页面视图
	Public function index(){
		$this->display();

	}

	//登录验证
	Public function login(){
		if (!IS_POST) E('无效的页面');
		 $db=M('login');
		 $user=$db->where(array('username'=>I('username')))->find();
		 // if (!$user || $user['psw'] != I('psw','',md5)) {
		 if (!$user || $user['psw'] != I('psw')) {
		 	$this->error('账号或密码错误');
		 }
		 //更新最后一次登录时间及IP
		 $data=array(
		 	'id'=>$user['id'],
		 	'logintime' => time(),
		 	'loginip'=> get_client_ip()
		 	);
		$db->save($data);

		session('uid',$user['id']);
		session('username',$user['username']);
		session('nikename',$user['nikename']);
		session('logintime',date('Y-m-d H:i:s',$user['logintime']));
		session('loginip',$user['loginip']);
		if(I('username') == 'admin'){
			session('admin',1);
		}else{
			session('admin',0);
		}
		$this->redirect('/Home/Index/index');
	}
	//修改密码页面
	public function inspsw()
	{
		//team
    	$team = M('team');
    	$rteam = $team->select();
    	$this->assign('team',$rteam);

		$db = M('login');
		$login = $db->select();
		$this->assign('login',$login);
		$this->display();
	}
	//修改密码表单
	public function inspswpost()
	{
		
		$psw = I('psw');
		$psw2 = I('psw2');

		if ($psw == $psw2) {
			$db = M('login');
			$id = session('uid');
			$data = array(
				'id'=>$id,
				'psw' => $psw 
				);
			$result = $db->save($data);
			if ($result) {
				$this->success('修改成功',U('/Home/Login/inspsw'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('两次密码输入不一致');
		}
		
	}
	//添加管理员
	public function addlogin(){
			//team
			$team = M('team');
			$rteam = $team->select();
			$this->assign('team',$rteam);

			$this->display();
		}
	//添加管理员表单
	public function addloginpost(){
		$username = I('username');
		$nikename = I('nikename');
		$psw = I('psw');
		$psw2 = I('psw2');
		$db = M('login');
		$where['username'] = $username;
		$result = $db-> where($where) -> select();
		if($result){
			$this -> error('重复的用户名');
		}
		if ($psw == $psw2) {
			$data = array(
				'username' => $username,
				'nikename' => $nikename,
				'psw' => $psw,
				'logintime' => time(),
				'loginip'=> get_client_ip()
				);
			$result = $db->add($data);
			if ($result) {
				$this->success('新增成功',U('/Home/Login/addlogin'));
			}else{
				$this->error('新增失败');
			}
		}else{
			$this->error('两次密码输入不一致');
			}
		}	
	//管理员管理
	public function alllogin(){
		//team
		$team = M('team');
		$rteam = $team->select();
		$this->assign('team',$rteam);

		$db = M('login');
		$where['username'] = array('neq','admin');
		$result = $db -> where($where)->select();
		$this ->assign('login',$result);
		$this->display();
	}
	//管理员修改页面
	public function inslogin(){
		//team
		$team = M('team');
		$rteam = $team->select();
		$this->assign('team',$rteam);
		
		$id = I('id');
		$db = M('login');
		$result = $db->where("id=$id")->select();
		$this->assign('login',$result);
		$this->display();
	}
	//管理员修改表单
	public function insloginpost(){
		$id = I('id');
		$nikename = I('nikename');
		$psw = I('psw');
		$psw2 = I('psw2');
		$db = M('login');
		if ($psw == $psw2) {
			$data = array(
				'nikename' => $nikename,
				'psw' => $psw,
				);
			$result = $db->where("id = $id")->save($data);
			if ($result) {
				$this->success('修改成功',U('/Home/Login/alllogin'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('两次密码输入不一致');
			}
	}
	//管理员删除
	public function delloginpost(){
		if (session('username')!='admin') E('非法操作');
		$id = I('id');
		$db = M('login');
		$result = $db -> delete($id);
		if ($result) {
			$this->success('删除成功',U('/Home/Login/alllogin'));
		}else{
			$this->error('删除失败');
		}
	}
	//登出
	Public function loginout(){
		session(null);
		$this->success('您已安全退出', U('/Home/Login/index'));
		}
		

}

 ?>