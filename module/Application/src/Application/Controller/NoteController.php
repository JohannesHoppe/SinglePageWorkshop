<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class NoteController extends AbstractRestfulController {

    public function indexAction()
    {
        return new JsonModel();
    }


    /**
     * @return array|mixed
     */
    public function getList() {

        return new JsonModel(array('data' => array(
            array('id' => 1, 'title' => 'Hallo'),
            array('id' => 2, 'title' => 'Du'),
        )));
    }

    /**
     * @param mixed $id
     * @return array|mixed
     */
    public function get($id) {
        // @TODO Insert get code and return data. -Artimon

        return new JsonModel(array('data' => array('id' => 1, 'title' => 'Hallo')));
    }

    /**
     * @param mixed $data
     * @return int|mixed
     */
    public function create($data) {
        // @TODO Insert create code and return data by new id. -Artimon
        $newId = 3;

        return new JsonModel(array(
            $this->get($newId)
        ));
    }

    /**
     * @param mixed $id
     * @param mixed $data
     * @return mixed|JsonModel
     */
    public function update($id, $data) {
        // @TODO Add update code here. -Artimon

        return new JsonModel(array(
            $this->get($id)
        ));
    }

    /**
     * @param mixed $id
     * @return mixed|JsonModel
     */
    public function delete($id) {
        // @TODO Add delete code here. -Artimon

        return new JsonModel(array(
            'data' => 'deleted'
        ));
    }
}