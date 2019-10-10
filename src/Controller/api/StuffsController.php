<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class StuffsController extends AppController
{  

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 100,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];

}