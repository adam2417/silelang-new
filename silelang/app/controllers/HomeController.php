<?php
class HomeController extends Controller{
    
    public function index(){
        $this->f3->set('page_head','Home');
        $this->f3->set('view','home/index.htm');
    }
}