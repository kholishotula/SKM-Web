<?php 

use Phalcon\Mvc\Router\Group as RouterGroup;

class LaporanRekapRoutes extends RouterGroup{
    public function initialize(){    

        $this->setPaths([
            'controller' => 'laporan',
        ]);

        $this->addGet(
            '/submission',
            [
                'action' => 'listSubmit',
            ]
        );

        $this->addGet(
            '/tampil-rekap',
            [
                'action' => 'listRekap',
            ]
        );

        $this->addPost(
            '/tampil-rekap',
            [
                'action' => 'delete',
            ]
        );

        $this->addGet(
            '/laporanrekap/tambah',
            [
                'action' => 'create',
            ]
        );
    
        $this->addPost(
            '/laporanrekap/tambah',
            [
                'action' => 'store',
            ]
        );

        $this->addPost(
            '/laporanrekap/ubah',
            [
                'action' => 'update',
            ]
        );

        $this->addGet(
            '/carilaporan',
            [
                'action' => 'searchRekap',
            ]
        );

        $this->addGet(
            '/carisubmission',
            [
                'action' => 'searchSubmit',
            ]
        );
    }
}