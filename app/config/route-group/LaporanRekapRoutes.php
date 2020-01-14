<?php 

use Phalcon\Mvc\Router\Group as RouterGroup;

class LaporanRekapRoutes extends RouterGroup{
    public function initialize(){    

        $this->setPaths([
            'controller' => 'laporan',
        ]);

        $this->addGet(
            '/unggah-laporan',
            [
                'action' => 'create',
            ]
        );
    
        $this->addPost(
            '/unggah-laporan',
            [
                'action' => 'store',
            ]
        );

        $this->addPost(
            '/hapus-laporan',
            [
                'action' => 'delete',
            ]
        );

        $this->addPost(
            '/tampil-laporan',
            [
                'action' => 'show',
            ]
        );
    }
}