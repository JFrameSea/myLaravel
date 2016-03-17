<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Dotenv;
class TestController extends Controller
{
    public function getDotenv()
    {
        $bathPath = base_path();
        /**
         * Test1
         * \: Global space
         */
        try {
            Dotenv::load('', '.env.default');
        } catch (\InvalidArgumentException $e) {
            echo $e->getmessage();
        }

        /**
         * Test2
         */
        $env = file($bathPath . DIRECTORY_SEPARATOR . '.env.default', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        dd($env);
        Dotenv::load($bathPath ,'.env.default');
    }
}