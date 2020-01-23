<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use Phalcon\Http\Request\File;
use App\Forms\AdminForm;

class IndexController extends Controller
{
	var $counter = array(100,200,300);

	public function initialize(){
		$this->messages = [
			'nama_admin' => '',
			'alamat' => '',
			'jabatan' => '',
			'jenis_kelamin' => '',
			'pendidikan_terakhir' => '',
			'username' => '',
			'password' => '',
			'foto_profil' => ''
		];
        $this->notif = "";
		$this->error = "";
		
	}

	public function indexAction()
	{
		if($this->session->get('auth')['id']!=null){
			$this->view->form = new AdminForm();
		}
	}

	public function show404Action()
	{
	}

	public function createAction(){
		$this->view->notif = $this->notif;
        $this->view->error = $this->error;
        $this->view->messages = $this->messages;
        $this->view->form = new AdminForm();
	}

	public function storeAction(){
        $flag=0;;
        if(!$this->request->isPost()){
            $this->response->redirect();
        }
        $form = new AdminForm();
        if($this->request->getPost('jenis_kelamin')==null){
            $this->message['jenis_kelamin'] = "Anda harus mengisi jenis kelamin";
            $flag = 1;
		}
		
        $username = $this->request->getPost('username');
        if(Admin::findfirst("username='$username'")){
			$this->message['username'] = "Username sudah digunakan";
			$flag = 1;
		}
		
        if(!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $msg)
                $this->message[$msg->getField()] = $msg;
		}
		
        if(!$flag && $this->request->hasFiles()==true) {
			$nama_admin = $this->request->getPost('nama_admin');
			$alamat = $this->request->getPost('alamat');
			$jabatan = $this->request->getPost('jabatan');
			$jenis_kelamin = $this->request->getPost('jenis_kelamin');
			$pendidikan_terakhir = $this->request->getPost('pendidikan_terakhir');
			$username = $this->request->getPost('username');
			$password = $this->security->hash($this->request->getPost('password'));
			$foto_profil = "temp.png";

			$user = new Admin();
			$user->construct($nama_admin,$alamat,$jabatan,$jenis_kelamin,$pendidikan_terakhir,$username,$password,$foto_profil);
			
			if($user->save()){
				$this->notif = 'Operator baru berhasil ditambahkan';
				foreach($this->request->getUploadedFiles() as $files) {
					$file_toDB = "img\\img_profil\\" . $user->getId() . '.' .$files->getExtension();
					$target_file = BASE_PATH . '\\public\\' . $file_toDB;
					$files->moveTo($target_file);
					$user->construct($nama_admin,$alamat,$jabatan,$jenis_kelamin,$pendidikan_terakhir,$username,$password,$file_toDB);
					$user->update();
				}
				$this->view->form = new AdminForm();
			}
			else{
				$this->error = 'Terjadi kesalahan saat menyimpan data. Coba ulangi kembali';
			}
        }
		return $this->response->redirect();
	}
	
};

?>