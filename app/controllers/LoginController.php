<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;

use App\Forms\LoginForm;


class LoginController extends Controller
{
    private $message = "";

    public function createAction()
    {
        if($this->session->has('auth'))
            $this->response->redirect('profile');


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
        $this->session->destroy();
     	$this->response->redirect();   
    }
}