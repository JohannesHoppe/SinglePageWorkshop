<?php

namespace Application\Controller;

use Application\Repository;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class NoteController extends AbstractRestfulController {

    private $repository;

    public function __construct() {
        $this->repository = new NoteRepository();
    }

    public function getList() {
        return new JsonModel($this->repository->readAll());
    }

    public function get($id) {
        return new JsonModel($this->repository->read($id));
    }

    public function create($data) {
        // @TODO Insert create code and return data by new id. -Artimon
        $newId = 3;

        return new JsonModel(array(
            $this->get($newId)
        ));
    }

    public function update($id, $data) {
        // @TODO Add update code here. -Artimon

        return new JsonModel(array(
            $this->get($id)
        ));
    }

    public function delete($id) {
        // @TODO Add delete code here. -Artimon

        return new JsonModel(array(
            'data' => 'deleted'
        ));
    }
}