<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyStoreRequest;
use App\Http\Factories\PropertyFactory;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('s');
        if($search) {
            $properties = PropertyFactory::getProperties_byCode(\Request::get('s'));
        } else {
            $properties = Property::paginate(15);
        }

        return view('admin.property.index')->with('properties', $properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyStoreRequest $request)
    {
        $path = $request->file('image')->store('images', 'local');

        $property = PropertyFactory::store(
            $request->input('title'),
            $request->input('code'),
            $request->input('type'),
            $request->input('cep'),
            $request->input('rua'),
            $request->input('city'),
            $request->input('state'),
            $request->input('neighborhood'),
            $request->input('number'),
            $request->input('complement'),
            $request->input('price'),
            $request->input('area'),
            $request->input('rooms'),
            $request->input('suites'),
            $request->input('bathrooms'),
            $request->input('living_rooms'),
            $request->input('garages'),
            $request->input('description'),
            $path
        );

        return redirect()->route('admin.property.index')->with('success', 'Imóvel salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('admin.property.edit')->with('property', $property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyStoreRequest $request, Property $property)
    {
        $property = PropertyFactory::update(
            $property,
            $request->input('title'),
            $request->input('code'),
            $request->input('type'),
            $request->input('cep'),
            $request->input('rua'),
            $request->input('city'),
            $request->input('state'),
            $request->input('neighborhood'),
            $request->input('number'),
            $request->input('complement'),
            $request->input('price'),
            $request->input('area'),
            $request->input('rooms'),
            $request->input('suites'),
            $request->input('bathrooms'),
            $request->input('living_rooms'),
            $request->input('garages'),
            $request->input('description'),
            $request->has('image') ? $request->file('image')->store('images') : null
        );

        return redirect()->route('admin.property.index')->with('success', 'Imóvel salvo com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property = PropertyFactory::destroy($property);

        return redirect()->route('admin.property.index')->with('success', 'Imóvel removido com sucesso.');
    }

    public function import() 
    {
        return view('admin.property.import');
    }

    public function handleImport(Request $request) 
    {
        $parser = \Parser::xml(file_get_contents($request->xml));

        $storedProperties = 0;
        foreach ($parser['Imoveis']['Imovel'] as $key => $item) {
            //Check for existent property
            if(PropertyFactory::getProperty_byCode($item['CodigoImovel'])) {
                continue;
            }

            if($item['PrecoVenda'] > 0) {
                $itemPrice = $item['PrecoVenda'];
            } else if($item['PrecoLocacao'] > 0) {
                $itemPrice = $item['PrecoLocacao'];
            } else if($item['PrecoLocacaoTemporada'] > 0) {
                $itemPrice = $item['PrecoLocacaoTemporada'];
            } else {
                $itemPrice = 0;
            }

            $property = PropertyFactory::store(
                $item['TipoImovel']. ' ' .$item['Cidade'],
                $item['CodigoImovel'],
                ($item['TipoImovel'] == 'Casa') ? 1 : 2,
                $item['CEP'],
                $request->input('rua'),
                $item['Cidade'],
                $item['UF'],
                $item['Bairro'],
                $item['Numero'],
                $item['Complemento'],
                $itemPrice,
                $item['AreaTotal'],
                $item['QtdDormitorios'],
                $item['QtdSuites'],
                $item['QtdBanheiros'],
                $item['QtdSalas'],
                $item['QtdVagas'],
                $item['Observacao']
            );

            if($property->exists()) {
                $storedProperties = $storedProperties + 1;
            }
        }

        return redirect()->route('admin.property.index')->with('success', $storedProperties .' Imóveis importados com sucesso.');
    }
}
