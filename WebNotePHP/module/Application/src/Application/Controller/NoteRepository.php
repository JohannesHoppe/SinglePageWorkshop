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

    }

    public function delete($id)
    {

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