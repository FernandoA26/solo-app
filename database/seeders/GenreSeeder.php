<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre = new Genre();
        $genre->name = 'Ciencia Ficción';
        $genre->description = 'La ciencia ficción es un género de la narrativa de ficción en el que están presentes avances científicos y técnicos, ya sea en el futuro o en el presente.';
        $genre->save();

        $genre1 = new Genre();
        $genre1->name = 'Bibliografico';
        $genre1->description = 'Una biografía es una descripción detallada de la vida de una persona, donde narra los hechos y logros más importantes como educación, trabajo, las relaciones y la muerte.';
        $genre1->save();

        $genre2 = new Genre();
        $genre2->name = 'No Ficción';
        $genre2->description = 'La no ficción es la exposición de la realidad con el objetivo de divulgar, informar o educar sobre un tema concreto.';
        $genre2->save();

    }
}
