<?php

use HelloWorld\Models\Movies;
use HelloWorld\Forms\AddMovieForm;
use Phalcon\Db\Column;
use Phalcon\Http\Response;


class MoviesController extends ControllerBase 
{
    public function indexAction()
    {
        $aResults = $this->modelsManager->createBuilder()
            ->from('HelloWorld\Models\Movies')
            ->getQuery()
            ->execute();

        $this->view->movies = $aResults;
        $this->logger->error('une première erreur');
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

                $this->db->insertAsDict(
                    'movies',
                    [
                        'title' => $title,
                        'year' => $year,
                        'director' => $director,
                        'plot' => $plot,
                        'country' => $country
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

    public function updateAction($id)
    {
        $movie = Movies::findFirst(
            [
                "id = '{$id}'"
            ]
        );
        $form = new AddMovieForm($movie);
        if($this->request->isPost())
        {
            if ($form->isValid(array_merge($this->request->getPost(), $_FILES))){
                $title = $this->request->getPost('title');
                $this->db->updateAsDict(
                    'movies',
                    [
                        'title' => $title
                    ],
                    [
                        'conditions' => 'id = ?',
                        'bind' => [$id],
                    ]
                );
            }
        }
        $this->view->form = $form;
        $this->view->movie = $movie;
    }

    public function deleteAction($id)
    {
        $movie = Movies::findFirst(
            "id = '{$id}'"
        );
        $this->db->delete(
            'movies',
            'id = ?',
            [
                $id
            ] 
        );
        $this->response->redirect('/movies');
    }
}