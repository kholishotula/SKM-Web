<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;

use App\Forms\LoginForm;
use App\Forms\AdminForm;
use App\Events\AdminSecureController;

class LoginController extends AdminSecureController
{
    private $message = "";

    public function createAction()
    {
        $this->view->message=$this->message;
        $user_rem = null;
        $remCookies = $this->cookies->get('remember');
        $remCookies = $remCookies->getValue();

        if($remCookies){
            $user_rem = [
                'username' => $remCookies['username'],
                'password' => $remCookies['password']
            ];
        }
        
        if(isset($_COOKIE['remember'])){
            die();
            $user_rem = [
                'username' => $_COOKIE['remember']['username'],
                'password' => $_COOKIE['remember']['password']
            ];
        }

        $this->view->form = new LoginForm($user_rem);

    }

    public function storeAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $remember = $this->request->getPost('remember');

        $user = Admin::findFirst("username='$username'");

        if($user)
        {
            if($this->security->checkHash($password, $user->password))
        	{
        		$this->session->set(
        			'auth',
        			[
                        'username' => $username,
                        'id' => $user->getId(),
                        'remember' => $remember
        			]
                );
                
                if($remember==1){
                    $this->cookies->set(
                        "remember",
                        [
                            'username' => $username,
                            'password' => $password,
                        ],
                        time() + 15 * 86400
                    );
                    $this->cookies->send();
                    setcookie("remember", ['username'=> $username, 'password'=>$password], (86400 * 15), '/');   
                }
        		(new Response())->redirect()->send();
            }
            else{
                $this->security->hash(rand());
                $this->message = "Password salah";
                $this->dispatcher->forward(['action'=> 'create']);
            }
        }
        else {
            if($password==="" | $username==="")
                $this->message = "Anda harus memasukkan username dan password untuk masuk";
            else
                $this->message = "Username dan/atau password salah.";

            $this->dispatcher->forward(['action'=> 'create']);
        }
    }

    public function destroyAction()
    {
        unset($this->session->auth);
     	$this->response->redirect();   
    }

    public function showAccountAction(){
        $username = $this->session->get('auth')['username'];
        $data = Admin::findFirst("username='$username'");

        $this->view->data = $data;
        $this->view->form = new AdminForm($data);
    }

    public function editAction(){

    }

    public function updateAction(){
        if(!$this->request->isPost()){
            $this->response->redirect('profile');
        }
        $id_admin = $this->request->getPost('id_admin');          
        $admin = Admin::findFirst("id_admin='$id_admin'");

        if($admin==null){
            $this->flashSession->error('Terjadi error saat pencarian data');
        }

        if($admin != null && $this->request->hasFiles() == true){
            $nama_admin = $this->request->getPost('nama_admin');
            $alamat = $this->request->getPost('alamat');
            $jabatan = $this->request->getPost('jabatan');
            $jenis_kelamin = $this->request->getPost('jenis_kelamin');
            $pendidikan_terakhir = $this->request->getPost('pendidikan_terakhir');
            $username = $this->request->getPost('username');
            $password = $this->security->hash($this->request->getPost('password'));
            $foto_profil = "temp.png";

            $admin->construct($nama_admin,$alamat,$jabatan,$jenis_kelamin,$pendidikan_terakhir,$username,$password,$foto_profil);
            if($admin->update()){
                foreach($this->request->getUploadedFiles() as $files) {
                    $file_toDB = "img\\img_profil\\" . $admin->getId() . '.' .$files->getExtension();
                    $target_file = BASE_PATH . '\\public\\' . $file_toDB;
                    $files->moveTo($target_file);
                    $admin->construct($nama_admin,$alamat,$jabatan,$jenis_kelamin,$pendidikan_terakhir,$username,$password,$file_toDB);
                    $admin->update();
                }
                $this->flashSession->success('Data operator berhasil diperbarui');
                $this->view->form = new AdminForm();
            }
            else{
                $this->flashSession->error('Terjadi kesalahan saat menyimpan data. Coba ulangi kembali');
            }
        }
        $this->response->redirect('profile');   
    }
}