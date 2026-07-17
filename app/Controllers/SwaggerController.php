<?php

namespace App\Controllers;

class SwaggerController extends BaseController
{
    public function index(): string
    {
        return view('swagger');
    }
}