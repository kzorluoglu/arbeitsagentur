<?php
namespace kzorluoglu\Arbeitsagentur;


use kzorluoglu\Arbeitsagentur\Contract\JobInterface;

class Company
{
    /** @return string file path */
    public function getCertificateFile()
    {
        return getenv('CertificateFilePath');
    }

    /** @return string */
    public function getCompanyName()
    {
        return getenv('CompanyName');
    }

    /** @return string */
    public function getSupplierID()
    {
        return getenv('SupplierID');
    }

    /** @return string */
    public function getAllianzpartnerNumber()
    {
        return getenv('AllianzpartnerNumber');
    }


    /** @return string */
    public function getPIN()
    {
        return getenv('PIN');
    }

    public function isValid()
    {
        if(empty($this->getCompanyName())){
            throw new \Exception('Company Name is empty');
            return false;
        }
        if(empty($this->getSupplierID())){
            throw new \Exception('SupplierID is empty');
        }
        if(empty($this->getAllianzpartnerNumber())){
            throw new \Exception('Allianzpartner Number Name is empty');
        }
        if(empty($this->getPIN())){
            throw new \Exception('PIN is empty');
        }
        return true;
    }
}