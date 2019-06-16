<?php
namespace kzorluoglu\Arbeitsagentur;


use kzorluoglu\Arbeitsagentur\Contract\JobInterface;

class Company
{
    /** @var string */
    private $certificateFilePath;

    /** @var string */
    private $companyName;

    /** @var string */
    private $supplierID;

    /** @var string */
    private $allianzpartnerNumber;

    /** @var string */
    private $pin;

    /**
     * @param string $certificateFilePath
     * @return Company
     */
    public function setCertificateFilePath(string $certificateFilePath): Company
    {
        $this->certificateFilePath = $certificateFilePath;
        return $this;
    }

    /**
     * @param string $companyName
     * @return Company
     */
    public function setCompanyName(string $companyName): Company
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @param string $supplierID
     * @return Company
     */
    public function setSupplierID(string $supplierID): Company
    {
        $this->supplierID = $supplierID;
        return $this;
    }

    /**
     * @param string $allianzpartnerNumber
     * @return Company
     */
    public function setAllianzpartnerNumber(string $allianzpartnerNumber): Company
    {
        $this->allianzpartnerNumber = $allianzpartnerNumber;
        return $this;
    }

    /**
     * @param string $pin
     * @return Company
     */
    public function setPIN(string $pin): Company
    {
        $this->pin = $pin;
        return $this;
    }


    /** @return string file path */
    public function getCertificateFile()
    {
        if(isset($this->certificateFilePath)){
            return $this->certificateFilePath;
        }
        throw new \Exception('Certificate File Path not defined, please use setCertificateFile() method');
    }

    /** @return string */
    public function getCompanyName()
    {
        if(isset($this->companyName)){
            return $this->companyName;
        }
        throw new \Exception('Company Name not defined, please use setCompanyName() method');
    }

    /** @return string */
    public function getSupplierID()
    {
        if(isset($this->supplierID)){
            return $this->supplierID;
        }
        throw new \Exception('Supplier ID not defined, please use setSupplierID() method');
    }

    /** @return string */
    public function getAllianzpartnerNumber()
    {
        if(isset($this->allianzpartnerNumber)){
            return $this->allianzpartnerNumber;
        }
        throw new \Exception('Allianzpartner Number not defined, please use setAllianzpartnerNumber() method');
    }


    /** @return string */
    public function getPIN()

    {
        if(isset($this->pin)){
            return $this->pin;
        }
        throw new \Exception('PIN Number not defined, please use setPIN() method');
    }

    public function isValid()
    {
        if(empty($this->getCompanyName())){
            throw new \Exception('Company Name is empty');
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