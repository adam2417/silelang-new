<?php
class LoginController extends Controller {
    function beforeroute() {
        $this->f3->set('message','');
        $this->f3->set('header','..\..\ui\template\login\header.htm');
        $this->f3->set('footer','..\..\ui\template\login\footer.htm');
    }
    
    function afterroute() {
        echo Template::instance()->render('..\..\ui\template\login\layout.htm');
    }
    
    function index(){
        $this->f3->set('page_head','Login');
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('view','login/index.htm');
    }
    
    function login_action(){
        $user = new User($this->db);
        if($this->f3->exists('POST.login')){
            $user = new User($this->db);
            $user->getByUsername($this->f3->get('POST.username'));
            
            if($user->username == $this->f3->get('POST.username')){ // If user exists
                if($user->pass == $this->f3->get('POST.password')) { // If the password correct
                    if($user->verify($this->f3->get('POST.username'),$this->f3->get('POST.password')) == true){ // If user and password match
                        if($user->status == '1'){
                            $session = new DB\SQL\Session($this->db,'tb_session');
                            $this->f3->set('SESSION.username',$this->f3->get('POST.username'));
                            $this->f3->set('SESSION.password',$this->f3->get('POST.password'));
                            $this->f3->set('SESSION.role',$user->role);

                            $this->f3->reroute('/home');
                        }else{
                            $this->f3->reroute('/login/User is inactive');
                        }
                    } else {
                        $this->f3->reroute('/login/Logged-in Unsuccessfull');
                    }
                }else {
                    $this->f3->reroute('/login/Password does not match');
                }
            }else{
                $this->f3->reroute('/login/User not exist');
            }
        }    
    }
    
    function logout_action(){        
        $this->f3->clear('SESSION');
        $this->f3->reroute('/login');
    }
}