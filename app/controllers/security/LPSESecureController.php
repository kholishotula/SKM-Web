<?php
namespace App\Events;

use Phalcon\Mvc\Controller;

class LPSESecureController extends Controller
{
    public function beforeExecuteRoute($dispatcher)
    {
        if($dispatcher->getActionName() != 'lpse'){
            if($dispatcher->getActionName() != 'responden'){
                if($dispatcher->getActionName() != 'storeRespond'){
                    if(!$this->session->has('responden')){
                        $this->dispatcher->forward(
                            [
                                'controller' => 'lpse',
                                'action' => 'lpse'
                            ]
                        );
                        return false;
                    }
                }
            }
        }
    }
    protected function back() {
        return $this->response->redirect($_SERVER['HTTP_REFERER']);
    }
}