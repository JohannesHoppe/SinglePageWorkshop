<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class NoteController extends AbstractRestfulController {

    public function getList() {

        return new JsonModel([
            [
                "Id" => "5282727b660b934d344ebbcd",
                "Title" => "Testeintrag",
                "Message" => "Ein gruener Postit",
                "Added" => "2012-06-12T22:00:00Z",
                "Categories" => ["hobby", "private"]
            ]
        ]);
    }

    public function get($id) {
        // @TODO Insert get code and return data. -Artimon

        return new JsonModel(array('data' => array('id' => $id, 'title' => 'Hallo')));
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