<?php

namespace App\Controller;

use App\Interfaces\IImage;
use App\Core\MainController;
use App\Model\DebugModel as DebugModel;

defined('ROOTPATH') OR exit('Access Denied!');

class ImageController implements IImage
{
    use MainController;
    
}