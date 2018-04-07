<?php
class UserController extends Controller {
 
    function index()
    {
        $username = $this->f3->get('SESSION.username');
        $role = $this->f3->get('SESSION.role');
        
        $user = new UserView($this->db);
        
        if($role == 1){
            $userView = $user->getView();
            $this->f3->set('users',$userView);
        } else if($role == 2){
            $user->getByUsername($username);
            $this->f3->set('notusers',$user);
        }
        
        $this->f3->set('page_head','Users');
        $this->f3->set('message',$this->f3->get('PARAMS.message'));
        $this->f3->set('view','users/list.htm');
    }
    
    function create(){
        if($this->f3->exists('POST.create')){
            $user = new User($this->db);
            
            $overwrite = false; // set to true, to overwrite an existing file; Default: false
            $files = $web->receive(function($file, $formFieldName) {
                    if ($file['type'] != 'application/pdf') return false;
                    // maybe you want to check the file size
                    if($file['size'] > (F3::instance()->get("max_file_size") * 1024 * 1024)) // if bigger than max_file_size MB
                        return false; // this file is not valid, return false will skip moving it
                
                    $this->f3->set('POST.proposal',$file['name']);
                
                    return true; // allows the file to be moved from php tmp dir to your defined upload dir
                },
                $overwrite,
                function($fileBaseName,$formFieldName){
                    $idlelang = $this->f3->get('POST.id_lelang');
                    $nodaftar = $this->f3->get('POST.nopendaftaran');
                    $kontraktor = $this->f3->get('POST.id_kontraktor');
                    
                    $fileBaseName = 'proposals/'.'proposal_'.$idlelang.$nodaftar.$kontraktor.'_'.base_convert(time(), 10, 16).'.pdf';
                    return $fileBaseName;
                }
            );
            
            $this->f3->set('POST.role','2');
            $user->add();
            
            $this->f3->reroute('/user');
        }else {
            $kontraktor = new Kontraktor($this->db);
            if($this->f3->exists('PARAMS.kontraktorid')){
                $cid = $this->f3->get('PARAMS.kontraktorid');                
                $kontraktor->getById($cid);
                $this->f3->set('kontraktors',$kontraktor);
            }
            
            $this->f3->set('page_head','Create New User');        
            $this->f3->set('view','users/add.htm');
        }        
    }
    
    function detail(){        
        $uid = $this->f3->get('PARAMS.userid');
        
        $user_view = new UserView($this->db);
        $user_view->getById($uid);
        $this->f3->set('user',$user_view);
        
        $this->f3->set('page_head','User Detail');
        $this->f3->set('view','users/detail.htm');
    }
    
    function delete() {
        if($this->f3->exists('PARAMS.userid'))
        {            
            $user = new User($this->db);            
            $userid = $this->f3->get('PARAMS.userid');            
            $user->delete($userid);            
        }        
        $this->f3->reroute('/user/Successfully deleted for user id '.$this->f3->get('PARAMS.userid'));    
    }
    
    function update(){
        $user = new User($this->db);
        if($this->f3->exists('POST.update')){
            $uid = $this->f3->get('POST.uid');
            $user->edit($uid);
            $this->f3->reroute('/user/Data updated successfully');
        }else {            
            $kontraktor = new UserView($this->db);
            if($this->f3->exists('PARAMS.uid')){
                $cid = $this->f3->get('PARAMS.uid');                
                $kontraktor->getById($cid);
                $this->f3->set('kontraktors',$kontraktor);
            }            
            $this->f3->set('page_head','Edit User');        
            $this->f3->set('view','users/update.htm');
        }
    }
}