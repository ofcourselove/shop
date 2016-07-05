<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{

 function login(){
 	if (IS_POST) {
 	  $username=I('post.username');
      $pwd=I('post.password');
      if (!($username&&$pwd)) {
      	  $this->error('请正确输入','',2);
      }
      $user=D('User');
      $date=$user->where("username=$username")->find();//where中要加引号 用find为一维数组
      //echo $date['email'];
      //var_dump($date['salt']);
      $p=md5($pwd.$date['salt']);
      //echo $p;
      //  var_dump($date);

      if (!$date) {
          $this->error('用户名错误','',3);     
      }else{
      	 if ($date['password']== $p) {
           $code= new \Think\Verify();
           if (!$code->check(I('post.vcode'))) {
                $this->error('验证码错误','',1);
           }
      	 	 cookie('userid',$date['user_id']);
      	 	 cookie('username',$date['username']);
           $key=secret($date['username'].$date['user_id']);
           cookie('key',$key);
         	 $this->success('登录成功','/shop/index.php/Home/index/index',3);
         }else{
         	$this->error('密码错误','',5);
         }
      }

   }
      
      $this->display();

   }
 function msg(){

 	$this->display();
 } 
 function reg(){
   	$reg=D('Home/User');
      if(IS_POST){
       // var_dump($_POST);
        if( !$reg->create()){
            echo $reg->getError();
            exit();
        }
       $reg->salt=$this->salt();
       $reg->password=md5($reg->password.$reg->salt);
       $reg->add();
      }
   	  $this->display();
   }
   function salt(){
     $str='abcdefgh123456';
     return substr(str_shuffle($str),'0','8');
           
   }
   function code(){
       $code= new \Think\Verify();
       $code->imageW=120;
       $code->imageH=70;
       $code->fontSize=20;
       $code->length=3;
       $code->entry();//$code->  entry是一个方法
          
   }
   function logout(){
      cookie('username',null);
      cookie('userid',null);
      cookie('key',null);
       $this->success('退出成功','/shop/index.php/Home/index/index',1);
   }



}













?>