<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Parsedown;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $relativePath = 'pages/';

    public function page($name)
    {
    	$result = $this->parse($name);

    	return !$result ?
    		response()->json(['error' => PAGE_NOT_FOUND, 'message' => trans('file_not_exists')], REST_RESOURCE_NOT_FOUND):
    		response()->json(['content' => $result]);
    }


    //exporting .md file function
    private function parse($name)
    {
    	$relativeFilename = $this->relativePath.$name.'.md';
    	if(!Storage::exists($relativeFilename)) {
    		return false;
    	}
    	$parser = new Parsedown();
    	$content = Storage::get($relativeFilename);

    	return $parser->parse($content);
    }
}
