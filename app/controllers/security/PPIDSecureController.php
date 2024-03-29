<?php
namespace App\Events;

use Phalcon\Mvc\Controller;

class PPIDSecureController extends Controller
{
    public function beforeExecuteRoute($dispatcher)
    {
        if($dispatcher->getActionName() != 'ppid'){
            if($dispatcher->getActionName() != 'responden'){
                if($dispatcher->getActionName() != 'storeRespond'){
                    if(!$this->session->has('responden')){
                        $this->dispatcher->forward(
                            [
                                'controller' => 'ppid',
                                'action' => 'ppid'
                            ]
                        );
                        return false;
                    }
                }
            }
        }
        if($dispatcher->getActionName() == 'responden'){
            if($this->session->has('responden')){
                return $this->response->redirect('ppid/kuesioner');
            }
        }
    }
    protected function back() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}