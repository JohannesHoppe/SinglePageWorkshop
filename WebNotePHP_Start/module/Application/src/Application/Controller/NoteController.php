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

    // GET
    public function getList() {
        return new JsonModel($this->repository->readAll());
    }

    // GET
    public function get($id) {
        return new JsonModel($this->repository->read($id));
    }

    // POST
    public function create($data) {

        $emptyNote = array(
            'Title' => "",
            'Message' => "",
            'Added' => new \MongoDate(),
            'Categories' => []
        );

        $newId = $this->repository->create($emptyNote);
        return new JsonModel([$newId]);
    }

    // PUT
    public function update($id, $data) {
        $this->repository->update($data);
        return new JsonModel();
    }

    // DELETE
    public function delete($id) {
        $this->repository->delete($id);
        return new JsonModel();
    }
}