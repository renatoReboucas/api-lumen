<?php


namespace App\Http\Controllers;
use App\Model\Episodeo;



class EpisodiosController extends BaseController {

    public function __construct()
    {
        $this->classe = Episodeo::class;
    }

    public function buscaPorSerie(int $serieId)
    {
       $episodios =  Episodeo::where('serie_id', $serieId)->get();

       return $episodios;
    }

}
