<?php

namespace App\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Editeur;
use App\Providers\Validator;
use App\Providers\View;

class LivreController
{

    public function index()
    {
        $livre = new Livre;
        $selectLivre = $livre->select();

        $listeLivres = [];
        foreach ($selectLivre as $tmp) {
            $auteur_id = $tmp['auteur_id'];
            $categorie_id = $tmp['categorie_id'];
            $editeur_id = $tmp['editeur_id'];

            $auteur = new Auteur;
            $selectAuteur = $auteur->selectId($auteur_id);

            $categorie = new Categorie;
            $selectCategorie = $categorie->selectId($categorie_id);

            $editeur = new Editeur;
            $selectEditeur = $editeur->selectId($editeur_id);

            $listeLivres[] = [
                'id' => $tmp['id'],
                'titre' => $tmp['titre'],
                'auteur_id' => $tmp['auteur_id'],
                'categorie_id' => $tmp['categorie_id'],
                'editeur_id' => $tmp['editeur'],
                'annee_publication' => $tmp['annee_publication'],
            ];
        }

        if ($selectLivre) {
            return View::render("livre/index", ['listeLivres' => $selectLivre]);
        }
        return View::render('error');
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $livre = new Livre;
            $selectLivre = $livre->selectId($data['id']);
            if ($selectLivre) {

                $auteur_id = $selectLivre['auteur_id'];
                $categorie_id = $selectLivre['categorie_id'];
                $editeur_id = $selectLivre['editeur_id'];

                $auteur = new Auteur;
                $selectAuteur = $auteur->selectId($auteur_id);

                $categorie = new Categorie;
                $selectCategorie = $categorie->selectId($categorie_id);

                $editeur = new Editeur;
                $selectEditeur = $editeur->selectId($editeur_id);

                return View::render("livre/show", [
                    'livre' => $selectLivre,
                    'listeAuteurs' => $selectCategorie,
                    'listeCategories' => $selectCategorie,
                    'listeEditeurs' => $selectEditeur
                ]);
            } else {
                return View::render('error', ['msg' => 'Livre not found!']);
            }
        } else {
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }

    public function create()
    {
        $auteur = new Auteur;
        $listeAuteurs = $auteur->select();

        $categorie = new Categorie;
        $listeCategories = $categorie->select();

        $editeur = new Editeur;
        $listeEditeurs = $editeur->select();

        return View::render("livre/create", [
            'listeAuteurs' => $listeAuteurs,
            'listeCategories' => $listeCategories,
            'listeEditeurs' => $listeEditeurs,
        ]);
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $livre = new Livre;
            $selectLivre = $livre->selectId($data['id']);
            if ($selectLivre) {

                $auteur = new Auteur;
                $listeAuteurs = $auteur->select();

                $categorie = new Categorie;
                $listeCategories = $categorie->select();

                $editeur = new Editeur;
                $listeEditeurs = $editeur->select();

                return View::render("livre/edit", [
                    'livre' => $selectLivre,
                    'listeAuteurs' => $listeAuteurs,
                    'listeCategories' => $listeCategories,
                    'listeEditeurs' => $listeEditeurs,
                ]);
            } else {
                return View::render('error', ['msg' => 'Livre not found!']);
            }
        } else {
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }

    public function store($data = [])
    {
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->required()->max(45);
        $validator->field('auteur_id', $data['auteur_id'])->required()->int();
        $validator->field('categorie_id', $data['categorie_id'])->required()->int();
        $validator->field('editeur_id', $data['editeur_id'])->required()->int();
        $validator->field('annee_publication', $data['annee_publication'])->required()->int()->max(4);

        if ($validator->isSuccess()) {
            $livre = new Livre;
            $insert = $livre->insert($data);
            if ($insert) {
                return View::redirect('livre/show?id=' . $insert);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $inputs = $data;

            //récupérer à nouveau les listes pour les Select
            $auteur = new Auteur;
            $listeAuteurs = $auteur->select();

            $categorie = new Categorie;
            $listeCategories = $categorie->select();

            $editeur = new Editeur;
            $listeEditeurs = $editeur->select();

            return View::render('livre/create', [
                'errors' => $errors,
                'inputs' => $inputs,
                'listeAuteurs' => $listeAuteurs,
                'listeCategories' => $listeCategories,
                'listeEditeurs' => $listeEditeurs,
            ]);
        }
    }

    public function delete($data = [])
    {
        $livre = new Livre;
        $delete = $livre->delete($data['id']);
        if ($delete) {
            return View::redirect('livre');
        }
        return View::render('error');
    }
}
