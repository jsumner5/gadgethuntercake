<?php
/**
 * Created by PhpStorm.
 * User: Jerold
 * Date: 6/10/2017
 * Time: 5:09 PM
 */

namespace App\Shell;

use Cake\Console\Shell;

class HelloShell extends Shell
{
    public function main()
    {
        include_once ('/../Controller/Component/AmazonService/AmazonService.php');
        include_once ("/../Controller/Component/AmazonService/AmazonService.php");
       // include_once ('public_html');
        $this->out('Hello world.');
    }
}