<?php
namespace App\Events;

use Phalcon\Mvc\Controller;

class AdminSecureController extends Controller
{
    public function beforeExecuteRoute($dispatcher)
    {
        if($dispatcher->getActionName() != 'create'){
            if($dispatcher->getActionName() != 'store'){
                if(!$this->session->has('auth')){
                    $this->response->redirect('login');
                }
            }
        }
        else{
            if($this->session->has('auth')){
                $this->response->redirect('profile');
            }
        }
    }
    protected function back() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}