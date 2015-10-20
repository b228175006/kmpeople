<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
	//首页
    public function index(){
    	// 人事档案信息
    	$db = M('people');
    	$count = $db->count();
    	$page = new \Lib\Page($count);
    	$limit = $page->firstRow.','.$page->listRows;
    	$result = $db->order('id DESC')->limit($limit)->select();
    	$this->page = $page->show();
    	$this -> assign('people',$result);
    	// 管理权限
    	$needadmin = needadmin();
    	$this -> assign('needadmin',$needadmin);
    	//team
    	$team = M('team');
    	$rteam = $team->select();
    	$this->assign('team',$rteam);

        $this -> display();
    }
    //搜索页
    public function seach(){
    	$team = M('team');
    	$rteam = $team->select();
    	$this->assign('team',$rteam);
    	
    	$name = I('name');
    	$team = I('team');
    	if ($team != '0') {
    		$where['team'] = $team;
    	}
    	if ($name != '') {
    		$where['name'] = $name;
    	}
    	$where['_logic'] = 'and';
    	$db = M('people');
    	$count = $db->count();
    	$page = new \Lib\Page($count);
    	$limit = $page->firstRow.','.$page->listRows;
    	$result = $db->order('id DESC')->where($where)->limit($limit)->select();
    	$this->page = $page->show();
    	$this -> assign('people',$result);
    	$this->display();

    }
    //人事档案添加
    public function addpeople(){
    		$db = M('team');
    		$result = $db -> select();
    		$this->assign('team',$result);
    		$this->display();
    	}
    //人事档案添加表单
    public function addpeoplepost(){
		$no = I('no');
		$name = I('name');
		$team = I('team');
		$position = I('position');
		$level = I('level');
		$entrytime = I('entrytime','',strtotime);
		$earns = I('earns');
		$sex = I('sex');
		$tel = I('tel');
		$birthday = I('birthday','',strtotime);
		$data = array(
			'no' => $no,
			'name' => $name,
			'team' => $team,
			'position' => $position,
			'level' => $level,
			'entrytime' => $entrytime,
			'earns' => $earns,
			'sex' => $sex,
			'tel' => $tel,
			'birthday' => $birthday
			);
		$db = M('people');
		$result = $db -> data($data) -> add();
		if ($result) {
			$this -> success('添加成功',U('Home/Index/addpeople'));
		}else{
			$this -> error('添加失败');
		}
    }	

    //人事档案修改
    public function inspeople(){
    	//team
    	$team = M('team');
    	$rteam = $team->select();
    	$this->assign('team',$rteam);

    	$id = I('id');
    	$db = M('people');//基本信息
    	$result = $db->where("id = $id")->select();
    	$db2 = M('info');//成长记录等信息
    	$info1 = $db2 -> where("uid = $id")->where('pid = 1')->select();//成长记录
    	$info2 = $db2 -> where("uid = $id")->where('pid = 2')->select();//培训记录
    	$info3 = $db2 -> where("uid = $id")->where('pid = 3')->select();//沟通记录
    	$birthday = date("Y",time()) - date("Y",$result[0]['birthday']);
        $peopleinfo = M('peopleinfo');
        $pinfo = $peopleinfo->where("uid = $id")->select();
        $work = M('workandf');
        $work1 = $work->where("uid =$id")->where('pid = 1')->select();
        $work2 = $work->where("uid =$id")->where('pid = 2')->select();
    	$this->assign('birthday',$birthday); 
    	$this -> assign('people',$result);
    	$this -> assign('info1',$info1);
    	$this -> assign('info2',$info2);
    	$this -> assign('info3',$info3);
        $this->assign('pinfo',$pinfo); 
        $this->assign('work1',$work1); 
        $this->assign('work2',$work2); 
    	$this -> display();
    	
    }

    //人事档案修改表单
    public function inspeoplepost(){
        $id = I('id');
        $no = I('no');
        $name = I('name');
        $team = I('team');
        $position = I('position');
        $level = I('level');
        $entrytime = I('entrytime','',strtotime);
        $earns = I('earns');
        $sex = I('sex');
        $tel = I('tel');
        $birthday = I('birthday','',strtotime);
        
        $data = array(
            'no' => $no,
            'name' => $name,
            'position' => $position,
            'level' => $level,
            'entrytime' => $entrytime,
            'earns' => $earns,
            'tel' => $tel,
            'birthday' => $birthday
            );
        if ($team != '0') {
            $data['team'] = $team;
        }
        if ($sex != '0') {
            $data['sex'] = $sex;
        }
        $db = M('people');
        $result = $db->where("id = $id")->data($data)->save();
        if ($result) {
            $this -> success('修改成功',U('Home/Index/inspeople',array('id'=>$id)));
        }else{
            $this -> error('修改失败');
        }
        
    }
    //人事档案删除
    public function delpeople(){
    	$id = I('id');
    	$db = M('info');
        $select = $db->field('orther')->where("uid = $id")->select();
        foreach ($select as $v) {
            $file = 'Public/'.$v['orther'];
            echo $file;
            // unlink($file);
        }
    	$result = $db->where("uid = $id")->delete();
    	$db = M('people');
    	$result = $db->where("id = $id")->delete();
        $db = M('peopleinfo');
        $result = $db->where("uid = $id")->delete();
    	if ($result) {
			$this -> success('删除成功',U('Home/Index/index'));
		}else{
			$this -> error('删除失败');
		}
    }
    //伙伴详细信息添加
    public function inspinfopost(){
        $uid = I('uid');
        $id =I('id');
        $gangwei=I('gangwei');
        $email=I('email');
        $familyname=I('familyname');
        $jiguan=I('jiguan');
        $marital=I('marital');
        $school=I('school');
        $professionals=I('professionals');
        $idnumber=I('idnumber');
        $census=I('census');
        $domicile=I('domicile');
        $emergency=I('emergency');
        $withhim=I('withhim');
        $emergencytel=I('emergencytel');

        $data = array(
             'gangwei' => $gangwei,
             'email' => $email,
             'familyname' => $familyname,
             'jiguan' => $jiguan,
             'marital' => $marital,
             'school' => $school,
             'professionals' => $professionals,
             'idnumber' => $idnumber,
             'census' => $census,
             'domicile' => $domicile,
             'emergency' => $emergency,
             'withhim' => $withhim,
             'emergencytel' => $emergencytel
            );

        $db = M('peopleinfo');
        $result = $db->where("uid = $uid")->select;

        if ($id =='') {
            $data['uid'] = $uid;
            $add = $db->data($data)->add();
            if ($add) {
                $this -> success('新增成功',U('Home/Index/inspeople',array('id'=>$uid)));
            }else{
                $this -> error('新增失败');
            }
        }else{
           
            $ins = $db->where("id = $id")->data($data)->save();
            if ($ins) {
                $this -> success('修改成功',U('Home/Index/inspeople',array('id'=>$uid)));
            }else{
                $this -> error('修改失败');
            }
        }

        

    }
    //伙伴工作经历&家庭成员添加
    public function addwork(){
        $pid = I('pid');
        $uid = I('uid');
        $value1 = I('value1');
        $value2 = I('value2');
        $value3 = I('value3');
        $value4 = I('value4');
        $data = array(
            'pid' => $pid,
            'uid' => $uid,
            'value1' => $value1,
            'value2' => $value2,
            'value3' => $value3,
            'value4' => $value4
            );
        $db = M('workandf');
        $result = $db->data($data)->add();
        if ($result) {
                $this -> success('新增成功',U('Home/Index/inspeople',array('id'=>$uid)));
            }else{
                $this -> error('新增失败');
            }
    }
    //伙伴工作经历&家庭成员删除
    public function delworkinfo(){
       $id = I('id');
       $uid = I('uid');
       $db = M('workandf');
       $result = $db->where("id = $id")->delete();
        if ($result) {
            $this -> success('删除成功',U('Home/Index/inspeople',array('id' => $uid)));
        }else{
            $this -> error('删除失败');
        }

    }
    //详细信息添加
    public function addinfo(){
        //附件上传
        $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     0 ;// 设置附件上传大小
            // $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/';
            $upload->savePath  =      'Uploads/'; // 设置附件上传目录
            // 上传文件 
            $update   =   $upload->upload();

        $orther = $update['orther']['savepath'].$update['orther']['savename'];

    	$info = I('info');
    	$pid = I('pid');
    	$uid = I('uid');
    	$data = array(
    		'info' => $info,
    		'pid' => $pid,
    		'uid' => $uid,
            'orther' => $orther,
    		'time' => time()
    		);
    	$db = M('info');
    	$result = $db -> data($data)->add();
    	if ($result) {
			$this -> success('添加成功',U('Home/Index/inspeople',array('id' => $uid)));
		}else{
			$this -> error('添加失败');
		}
    }
    //详细信息删除
    public function delinfo(){
    	$uid = I('uid');
    	$id = I('id');
    	$db = M('info');
        //删文件
        $select = $db->field('orther')->where("id = $id")->select();
        $file = 'Public/'.$select['0']['orther'];
        unlink($file);

    	$result = $db->where("id = $id")->delete();
    	if ($result) {
			$this -> success('删除成功',U('Home/Index/inspeople',array('id' => $uid)));
		}else{
			$this -> error('删除失败');
		}
    }
    //团队设置
    public function team(){
    	//team
    	$team = M('team');
    	$rteam = $team->select();
    	$this->assign('team',$rteam);
    	$this->display();
    }
    //新增team
    public function addteam(){
    	if(!IS_POST) E('非法操作');
    	$name = I('name');
    	$db = M('team');
    	$data['name'] = $name;
    	$result = $db->data($data)->add();
    	if ($result) {
			$this -> success('添加成功',U('Home/Index/team'));
		}else{
			$this -> error('添加失败');
		}
    }
    //修改team
    public function insteam(){
    	if(!IS_POST) E('非法操作');
    	$id = I('id');
    	$name = I('name');
    	$db = M('team');
    	$data['name'] = $name;
    	$result = $db->where("id = $id")->data($data)->save();
    	if ($result) {
			$this -> success('修改成功',U('Home/Index/team'));
		}else{
			$this -> error('修改失败');
		}
    }
    //删除team
    public function delteam(){
    	$id = I('id');
    	$db = M('team');
    	$result = $db->where("id = $id")->delete();
    	if ($result) {
			$this -> success('删除成功',U('Home/Index/team'));
		}else{
			$this -> error('删除失败');
		}
    }
}





?>