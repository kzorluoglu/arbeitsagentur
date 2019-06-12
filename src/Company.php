<?php
namespace kzorluoglu\Arbeitsagentur;


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
}