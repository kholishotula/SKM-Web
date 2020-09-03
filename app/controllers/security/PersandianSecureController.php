<?php
namespace App\Events;

use Phalcon\Mvc\Controller;

class PersandianSecureController extends Controller
{
    public function beforeExecuteRoute($dispatcher)
    {
        if($dispatcher->getActionName() != 'persandian'){
            if($dispatcher->getActionName() != 'responden'){
                if($dispatcher->getActionName() != 'storeRespond'){
                    if(!$this->session->has('responden')){
                        $this->dispatcher->forward(
                            [
                                'controller' => 'persandian',
                                'action' => 'persandian'
                            ]
                        );
                        return false;
                    }
                }
            }
        }
        if($dispatcher->getActionName() == 'responden'){
            if($this->session->has('responden')){
                return $this->response->redirect('persandian/kuesioner');
            }
        }
    }
    protected function back() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}