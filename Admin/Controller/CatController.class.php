<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {

	protected $model=null;

	public function __construct(){
      parent :: __construct();
      $this->model=D('Cat');

	}
    public function cateadd(){
     
     if (IS_POST) {
     	echo  $this->model->add($_POST) ? 'ok' : 'fail'; 
     }else{
      $this->display();
     }

  }

    public function catelist(){

     $this->assign('acts', $this->model->gettree());
      $this->display();
    }
}