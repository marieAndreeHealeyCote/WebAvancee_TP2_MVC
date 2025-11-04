<?php

namespace App\Models;

use App\Models\CRUD;

class Editeur extends CRUD
{
    protected $table = 'editeur';
    protected $primaryKey = 'id';
    protected $fillable = ['nom'];
}
