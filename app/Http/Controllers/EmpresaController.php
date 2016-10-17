<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use DB;
use App\Http\Requests;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'empresa_logo_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/logos/empresa/";
            $file -> move($path,$name);
        }
        $empresa = new Empresa($request->all());

        $empresa->logo = $name;
        $empresa->fecha = Date('Y-m-d');
        $empresa->save();
        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getall(){
        //dd($pais,$ciudad);
        $not = Empresa::all();
        $not = DB::table('empresas')
                ->orderBy('visitas')
                ->get();
        return response()->json( $not );
    }

    public function negocios($pais , $ciudad){
        //dd($pais,$ciudad);
        $not = DB::table('empresas')->where([
            ['pais', 'like', '%'.$pais.'%'],
            ['region', 'like', '%'.$ciudad.'%'],
        ])->get();
        return response()->json( $not );
    }

    public function addDataSession(Request $request)
    {
        session(['pais' => $request->pais]); //usando el helper
        session(['region' => $request->region]); //usando el helper
    }
    public function getDataSession()
    {
        $data = \Session::all(); //usando el Facade
        return response()->json( $data );
    }
}
