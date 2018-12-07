<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyExtraController extends Controller
{
    public function doSomething()
    {
        echo "Even numbers";
        for($i = 10; $i<=20; $i++)
        {
            if($i%2 == 0)
            {
                echo "Number $i is even";
            }
        }
    }
}
