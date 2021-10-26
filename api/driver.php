<?php
class Driver implements JsonSerializable {
    protected $id;
    protected $fullname;
    protected $cellphone;
    protected $license;
    protected $ci;
    protected $picture;
    protected $status;

    public function __construct($id, $fullname, $cellphone, $license, $ci, $picture, $status)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->cellphone = $cellphone;
        $this->license = $license;
        $this->ci = $ci;
        $this->picture = $picture;
        $this->status = $status;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'cellphone' => $this->cellphone,
            'license' => $this->license,
            'ci' => $this->ci,
            'picture' => $this->picture,
            'status' => $this->status
        ];
    }
}
