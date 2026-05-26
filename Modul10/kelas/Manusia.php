<?php
class manusia 
{
    // untuk deklarasi Variabelnya
    protected $name;
    protected $nik="3557702060800660004";
    protected $umur;

    public function getNama()
    {
        return $this->name;
    }
    public function setNama ($name) 
    {
        $this->name=$name;
    }
    public function getNIK()
    {
        return "{$this->nik}" ;
    }
    public function getumur()
    {
        return $this->umur;
    }
    public function setumur($umur)
    {
        $this->umur=$umur;
    }
 }