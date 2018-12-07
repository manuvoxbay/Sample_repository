<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyExtraController extends Controller
{
    public function doSomething()
    {
        for($i = 10; $i<=20; $i++)
        {
            echo "$i is the $i";
            echo "<br/>";
        }
    }
}
