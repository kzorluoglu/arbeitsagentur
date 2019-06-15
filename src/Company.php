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
        return getenv('CertificateFilePath');
    }

    /** @return string */
    public function getCompanyName()
    {
        if(isset($this->companyName)){
            return $this->companyName;
        }
        return getenv('CompanyName');
    }

    /** @return string */
    public function getSupplierID()
    {
        if(isset($this->supplierID)){
            return $this->supplierID;
        }
        return getenv('SupplierID');
    }

    /** @return string */
    public function getAllianzpartnerNumber()
    {
        if(isset($this->allianzpartnerNumber)){
            return $this->allianzpartnerNumber;
        }
        return getenv('AllianzpartnerNumber');
    }


    /** @return string */
    public function getPIN()
    {
        if(isset($this->pin)){
            return $this->pin;
        }
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