<?php

namespace Application\Controller;

class NoteRepository {

    const connectionString = "mongodb://localhost";

    private $notes;

    public function __construct() {

        $client = new \MongoClient();
        $database = $client->WebNote;
        $this->notes = $database->Notes;
    }

    public function create($item)
    {
        $this->notes->insert($item);
        return $item["_id"]->{'$id'};
    }

    public function read($id)
    {
        // The most common mistake is attempting to use a string to match a MongoId.
        $id = new \MongoId($id);
        $doc = $this->notes->findOne(array('_id' => $id));
        return $this->docToArray($doc);;
    }

    public function readAll()
    {
        $cursor = $this->notes->find();

        $result = [];
        foreach ($cursor as $doc) {
            $result[] = $this->docToArray($doc);
        }
        return $result;
    }

    public function update($item)
    {
        $filter = array('_id' => new \MongoId($item["Id"]));

        $update = array('$set' => array(
            'Title' => $item["Title"],
            'Message' => $item["Message"],
            'Categories' => $item["Categories"])
        );

        $this->notes->update($filter, $update);
    }

    public function delete($id)
    {
        $id = new \MongoId($id);
        $this->notes->remove(array('_id' => $id));
    }

    private function docToArray($doc) {

        return array(
            'Id' => $doc["_id"]->{'$id'},
            'Title' => $doc["Title"],
            'Message' => $doc["Message"],
            'Added' => date(DATE_ISO8601, $doc["Added"]->sec),
            'Categories' => $doc["Categories"]
        );
    }
}