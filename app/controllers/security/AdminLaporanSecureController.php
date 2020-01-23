<?php
namespace App\Events;

use Phalcon\Mvc\Controller;

class AdminLaporanSecureController extends Controller
{
    public function beforeExecuteRoute($dispatcher)
    {
        if($dispatcher->getActionName() != 'laporan'){
            if(!$this->session->has('auth')){
                $this->response->redirect('login');
            }
        }
    }
    protected function back() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}