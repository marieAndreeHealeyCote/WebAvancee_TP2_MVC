<?php

namespace App\Models;

use App\Models\CRUD;

class Livre extends CRUD
{
    protected $table = 'livre';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'annee_publication', 'genre', 'categorie_id', 'editeur_id', 'auteur_id'];
}
