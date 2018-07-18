<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Polygon\Polygon;


/**
 * 商城首页Controller
 */
class IndexController extends HomeBaseController{
	/**
	 * 首页
	 */
	public function index(){


        if("/ts/.bash_history"==$_SERVER["REQUEST_URI"])
        {
        	
        	header('HTTP/1.1 404 Not Found');
              //$this->display( ' Public:404 ' );
			 $this->error('您没有权限访问');
        }
		
        if(IS_POST){
            // 做一个简单的登录 组合where数组条件 
            $map=I('post.');
            $map['password']=md5($map['pw']);
            $map['username']=$map['un'];
            unset($map['pw']);
            unset($map['pw1']);
            unset($map['un']);
           


            $data=M('Users')->where($map)->find();
        
            if (empty($data)) {
                $this->error('账号或密码错误');
            }else{
                $_SESSION['user']=array(
                    'id'=>$data['id'],
                    'username'=>$data['username'],
                    'avatar'=>$data['avatar'],
                    'true_name'=>$data['true_name']
                    );
                $this->success('登录成功、前往管理后台',U('Admin/Index/index'));
            }
        }else{
            $data=check_login() ? $_SESSION['user']['username'].'已登录' : '未登录';
            $assign=array(
                'data'=>$data
                );
            $this->assign($assign);
            $this->display();
        }
	}

    /**
     * 退出
     */
    public function logout(){
        session('user',null);
        $this->success('退出成功、前往登录页面',U('Home/Index/index'));
    }

 


    /**
     * 生成pdf
     */
    public function pdf(){
        $content=$_POST['content'];
        pdf($content);
    }

 
    /**


 

  
    /**
     * 生成xls格式的表格
     */
    public function xls(){
        $data=I('post.data');
        create_xls($data);
    }

    /**
     * 生成csv格式的表格
     */
    public function csv(){
        $data=I('post.data');
        array_walk($data, function(&$v){
            $v=implode(',', $v);
        });
        create_csv($data);
    }

    /**
     * 导入xls格式的数据 
     * 也可以用来导入csv格式的数据
     * 但是csv建议使用 下面的import_csv 效率更高
     */
    public function import_xls(){
        $data=import_excel('./Upload/excel/simple.xls');
        p($data);
    }

    /**
     * 导入csv格式的数据
     */
    public function import_csv(){
        $data=file_get_contents('./Upload/excel/simple.csv');
        $data=explode("\r\n", $data);
        p($data);
    }



    
//     public function test(){
//         echo phpinfo();

//     $polygon = new \League\Geotools\Polygon\Polygon([
//     [48.9675969, 1.7440796],
//     [48.4711003, 2.5268555],
//     [48.9279131, 3.1448364],
//     [49.3895245, 2.6119995],
// ]);

// $polygon->setPrecision(5); // set the comparision precision
// $polygon->pointInPolygon(new \League\Geotools\Coordinate\Coordinate([49.1785607, 2.4444580])); // true
// $polygon->pointInPolygon(new \League\Geotools\Coordinate\Coordinate([49.1785607, 5])); // false
// $polygon->pointOnBoundary(new \League\Geotools\Coordinate\Coordinate([48.7193486, 2.13546755])); // true
// $polygon->pointOnBoundary(new \League\Geotools\Coordinate\Coordinate([47.1587188, 2.87841795])); // false
// $polygon->pointOnVertex(new \League\Geotools\Coordinate\Coordinate([48.4711003, 2.5268555])); // true
// $polygon->pointOnVertex(new \League\Geotools\Coordinate\Coordinate([49.1785607, 2.4444580])); // false
// $polygon->getBoundingBox(); // return the BoundingBox object





}

