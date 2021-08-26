<?php

namespace App\Http\Controllers;

use App\Notice;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticesController extends Controller
{
    /**
     * Display list of notices
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $notices = Notice::all();

        return view('index')->with(['notices' => $notices, 'title' => 'Lista de noticias']);
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
    public function store(Request $request)
    {
        try {
            $file = storage_path() . "\app\\noticias.json";
            $noticesJson = json_decode(file_get_contents($file),true);

            foreach ($noticesJson as $item) {
                Notice::create($item);
            }

            return redirect()->route('index')->with('success', 'Noticias inseridas com sucesso!');

        } catch (\Exception $e) {
            return Response()->json([
                'status' => 401,
                'codeError' => $e->getMessage(),
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
}
