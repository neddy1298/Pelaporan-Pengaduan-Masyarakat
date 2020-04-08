<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:masyarakat']);
    }

    public function index()
    {

    }

}
