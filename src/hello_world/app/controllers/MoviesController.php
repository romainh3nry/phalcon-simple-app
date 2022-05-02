<?php

use HelloWorld\Models\Movies;
use HelloWorld\Forms\AddMovieForm;

class MoviesController extends ControllerBase 
{
    public function indexAction()
    {
        $sPhSql = "select * from HelloWorld\Models\Movies";
        $aResults = $this->modelsManager->executeQuery($sPhSql);
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