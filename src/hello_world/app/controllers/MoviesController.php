<?php

use HelloWorld\Models\Movies;
use HelloWorld\Forms\AddMovieForm;
use Phalcon\Db\Column;

class MoviesController extends ControllerBase 
{
    public function indexAction()
    {
        $aResults = $this->modelsManager->createBuilder()
            ->from('HelloWorld\Models\Movies')
            ->where('HelloWorld\Models\Movies.year = :year:',
                [
                    'year' => 2021
                ]
            )
            ->andWhere(
                'HelloWorld\Models\Movies.title LIKE :search:',
                [
                    'search' => '%une%'
                ]
            )
            ->limit(1)
            ->getQuery()
            ->execute();

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

    public function filterAction()
    {
        $sSql = 'select * from movies';
        $oResults = $this->db->query($sSql);
        $result = [];
        while ($aElement = $oResults->fetch())
        {
            $result[] = $aElement;
        }
        $this->view->movies = $result;
    }
}