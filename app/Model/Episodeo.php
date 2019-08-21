<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Episodeo extends Model{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $appends = ['links'];
    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodios/'. $this->id,
            'serie' => '/series/'. $this->serie_id. '/episodios'
        ];

    }



}
