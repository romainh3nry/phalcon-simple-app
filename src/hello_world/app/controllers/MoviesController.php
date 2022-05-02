<?php

use HelloWorld\Models\Movies;
use HelloWorld\Forms\AddMovieForm;
use Phalcon\Db\Column;

class MoviesController extends ControllerBase 
{
    public function indexAction()
    {
        $oRequest = $this->modelsManager->createQuery(
            "select * from HelloWorld\Models\Movies where title LIKE :search:"
        );

        $oRequest->cache(
            [
                'key' => 'movies_phsql',
                'lifetime' => 14400,
            ]
        );

        $aResults = $oRequest->execute(
            [
                'search' => '%une%'
            ]
        );

        $this->view->movies = $aResults;
    }

    public function addAction()
    {
        $form = new AddMovieForm();
        $this->view->form = $form;

        if ($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES)))
            {
                $newMovie = new Movies();
                $form->bind($this->request->getPost(), $newMovie);
                $newMovie->save();
            }
        }
    }
}