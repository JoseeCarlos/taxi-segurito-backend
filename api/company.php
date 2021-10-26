<?php
class Company implements JsonSerializable {
    public $id;
    public $name;
    public $nit;
    public $status;

    public function __construct($id, $name, $nit, $status) {
        $this->id = $id;
        $this->name = $name;
        $this->nit = $nit;
        $this->status = $status;
    }

    // public static function fromJson($json) {
    //     $companyArray = json_decode($json, true);
    //     return new Company(
    //         $companyArray['id'],
    //         $companyArray['name'],
    //         $companyArray['nit'],
    //         $companyArray['status'],
    //     );
    // }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nit' => $this->nit,
            'status' => $this->status
        ];
    }
}