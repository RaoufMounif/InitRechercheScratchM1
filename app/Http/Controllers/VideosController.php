<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use DOMDocument;
use XSLTProcessor;
use Illuminate\Support\Facades\Storage;
class VideosController extends Controller
{
    //

    public function show()
    {
        return view('video');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $parsedVideo= $this->parse($request->get('xmlVideo'));
        $var = $request->get('xmlVideo');
        $var=$var." ";
        Video::create([
            'xml' => $var ,
            'pseudo_code' => $parsedVideo,
            'user_id' => auth()->id()
    ]);


        return back();

    //return(view('home'));
    }

    public function parse($xmlText){






            //$xml = simplexml_load_file("../saved_projects/".$data.".xml");
            //$xml= readfile("../saved_projects/".$data.".xml");

            $xml = new DOMDocument;
            $xml->loadXML($xmlText);
//            $xml->load("../saved_projects/".$data.".xml");

            $xsl = new DOMDocument;
            $xsl->load('scratch2txt.xsl');

// Configuration du transformateur
            $proc = new XSLTProcessor;
            $proc->importStyleSheet($xsl); // attachement des règles xsl
            $entree=$proc->transformToXML($xml);
            return $entree;


        }
}
