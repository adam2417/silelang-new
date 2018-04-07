<?php
class Controller {
    protected $f3;
    protected $db;
    
    public function beforeroute() {
        $this->f3->set('message','');
        $this->f3->set('header','..\..\ui\template\main\header.htm');
        $this->f3->set('navigation','..\..\ui\template\main\navigation.htm');
        $this->f3->set('left_nav','..\..\ui\template\main\left_nav.htm');
        $this->f3->set('top_nav','..\..\ui\template\main\top_nav.htm');
        $this->f3->set('footer','..\..\ui\template\main\footer.htm');
                
        $session = new DB\SQL\Session($this->db,'tb_session');
        if(!empty($this->f3->get('SESSION.username'))){
            $this->f3->set('username',strtoupper($this->f3->get('SESSION.username')));
        }else {
            $this->f3->clear('SESSION');
            $this->f3->reroute('/login');
        }
    }
    
    public function afterroute() {
        $mnu_nav = new MenuMatriksView($this->db);
        $this->f3->set('menu_list',$mnu_nav->getMenuByRole($this->f3->get('SESSION.role')));
        
        $tpl = Template::instance();
        $tpl->filter('fmtdate','Filters::date');
        echo $tpl->render('..\..\ui\template\main\layout.htm');
    }
    
    public function __construct() {
        $f3 = Base::instance();
        
        $db = new DB\SQL(
            $f3->get('db_con') . $f3->get('db_name'),
            $f3->get('db_user'),
            $f3->get('db_pass')
        );
        
        $this->f3 = $f3;
        $this->db = $db;
    }
}