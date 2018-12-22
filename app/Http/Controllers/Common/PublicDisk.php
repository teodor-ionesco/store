<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PublicDisk extends Controller
{
	/*
	*	Download file from public disk
	*/
    public function read($file)
    {
    	return Storage::disk('public') -> download($file);
    }
}
