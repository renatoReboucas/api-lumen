<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model {


    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 10;
    protected  $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodeo::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/series/'. $this->id,
            'episodios' => '/series/'. $this->id. '/episodios'
    ];

    }
}
