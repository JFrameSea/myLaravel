<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;

use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Loader\PhpFileLoader;

use Dotenv;
class TestController extends Controller
{
    public function getT5()
    {
        $publicPath = public_path();
        $path = $publicPath . '/static/trans/zh.php';

        $translator = new Translator('zh_CN', new MessageSelector());
        $translator->setFallbackLocales(array('zh'));
        $translator->addLoader('file', new PhpFileLoader());
        $translator->addResource('file', $path, 'zh');

        echo $translator->trans('name');

    }

    public function getT4()
    {
        $arr = array(
            'key1' => 'v1',
            'key2' => 'v2',
            'key3' => 'v3',
            'key4' => 'v4',
        );
        var_dump($arr);
        dump($arr);
    }

    public function getT3()
    {
        $publicPath = public_path();
        $path = $publicPath . '/static/yaml/test.yaml';

        $dumper = new Dumper();
        $arr = array('name' => 'Grimmjow', 'age' => 13);
        $yaml = $dumper->dump($arr);
        dd($yaml);
    }

    public function getT2()
    {
        $publicPath = public_path();
        $path = $publicPath . '/static/yaml/test.yaml';
        $contents = file_get_contents($path);

        $parser = new Parser();
        $re = $parser->parse($contents);
        print_r($re);
    }

    public function getT1()
    {
        $callback = function($item) {
            return '[' . trim($item) . ']';
        };

        list($key, $value) = array_map($callback, explode('=', ' key = value =sdf', 2));
        dd($key, $value);
    }

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
            dump($e);
        }

        /**
         * Test2
         */
        $env = file($bathPath . DIRECTORY_SEPARATOR . '.env.default', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        dump($env);

        dump(env('APP_NAME'));

        Dotenv::load($bathPath ,'.env.default');
        dump($_ENV['TEST_KEY'], $_SERVER['TEST_KEY'], getenv('TEST_KEY'), env('TEST_KEY'));
    }

}
