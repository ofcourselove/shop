<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
         $cat=D('Admin/Cat');  // 必须“/” no"\"
         $goods=D('Admin/Goods');
         $gdate=$goods->field('goods_id,goods_name,shop_price,market_price,thumb_img')->where('is_hot=1')->order('goods_id desc')->limit('0,4')->select();
         $this->assign('goods',$gdate);
         $date=$cat->gettree();
         $this->assign('cat',$date);
         //var_dump($date);
         //session(null);
         $this->assign('history',array_reverse(session('history')));
         $this->display();

       }
    

}