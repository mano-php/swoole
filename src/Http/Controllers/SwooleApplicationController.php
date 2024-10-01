<?php

namespace ManoCode\Swoole\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 *
 */
class SwooleApplicationController extends Controller
{
    public function index()
    {
        $page = $this->basePage()->body('Swoole模块');

        return $this->response()->success($page);
    }
}
