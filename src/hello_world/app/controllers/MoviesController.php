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
                $title = $this->request->getPost('title');
                $year = $this->request->getPost('year');
                $director = $this->request->getPost('director');
                $plot = $this->request->getPost('plot');
                $country = $this->request->getPost('country');

                $this->db->insert(
                    'movies',
                    [
                        $title,
                        $year,
                        $director,
                        $plot,
                        $country
                    ],
                    [
                        'title',
                        'year',
                        'director',
                        'plot',
                        'country'
                    ]
                );
            }
        }
    }

    public function filterAction()
    {
        $oRequetePrepare = $this->db->prepare(
            'select * from movies where year = :year'
        );
        $oResul = $this->db->executePrepared
        (
            $oRequetePrepare,
            [
                'year' => 2021
            ],
            null
        );
        $this->view->movies = $oResul;
    }
}