<?php

namespace App\Http\Controllers;

use App\Notice;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticesController extends Controller
{
    /**
     * Get all titles
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAllTitles() {

        $notices = Notice::select('id', 'titulo')->get();

        // return view('index')->with(['notices' => $notices, 'title' => 'Lista de noticias']);
        return Response()->json($notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notices.create', ['title' => 'Adicionar noticias']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeJson(Request $request)
    {
        try {
            $json = file_get_contents('php://input');
            $formatJson = json_decode($json, true);
   
            foreach ($formatJson as $item) {
                Notice::create($item);
            }

            return Response()->json(['status' => 200, 'message' => 'Notices registered']);

        } catch (\Exception $e) {
            return Response()->json([
                'status' => 401,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);

        $notice->data_publicacao = new DateTime($notice->data_publicacao);
        
        
        return view('notices.show')->with(['title' => $notice->titulo,'notice' => $notice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSpecificNotice($id)
    {
        $notice = Notice::find($id);

        $notice->conteudo =  str_replace(array("\r", "\n"), "<br />", $notice->conteudo);
        $notice->data_publicacao = new DateTime($notice->data_publicacao);

        return Response()->json($notice);
    }
}
