<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected string $module;

    public function __construct($module)
    {
        $this->module = $module;
        $this->middleware('permission:read_' . $this->module .',admin')->only('index');
        $this->middleware('permission:create_' . $this->module .',admin')->only('create');
        $this->middleware('permission:update_' . $this->module .',admin')->only('edit');
        $this->middleware('permission:delete_' . $this->module .',admin')->only('destroy');
    }
}
