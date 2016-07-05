<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
   
   protected $_validate=array(
     //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
       array('username','3,9','用户名长度有误','1','length','3'),
       array('email','email','邮箱格式有误','1','','3'),
       array('password','6,16','密码长度不合法','1','length','3'),
       array('repwd','password','两次密码不一致','1','confirm','3'),
       array('username','','用户名已存在','1','unique','3'),
   	);


}









?>