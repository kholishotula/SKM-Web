<?php
namespace App\Events;

use Phalcon\Mvc\Controller;

class AdminKuesionerSecureController extends Controller
{
    public function beforeExecuteRoute($dispatcher)
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('login');
        }
    }
    protected function back() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}