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

	/** @var string */
	private $HiringCompanyID;

	/** @var string */
	private $HiringCompanyWebpage;

	/** @var string */
	private $HiringCompanySize;

	/** @var string */
	private $HiringCompanyIndustry;

	/** @var string */
	private $Salutation;

	/** @var string */
	private $Title;

	/** @var string */
	private $GivenName;

	/** @var string */
	private $FamilyName;

	/** @var string */
	private $PositionTitle;

	/** @var string */
	private $CountryCode;

	/** @var string */
	private $Region;

	/** @var string */
	private $PostalCode;

	/** @var string */
	private $Municipality;

	/** @var string */
	private $StreetName;

	/** @var string */
	private $IntlCode;

	/** @var string */
	private $AreaCode;

	/** @var string */
	private $TelNumber;

	/** @var string */
	private $EMail;

	/** @var string */
	private $GeneralWebSite;

	/**
	 * @return mixed
	 */
	public function getHiringCompanyID()
	{
		return $this->HiringCompanyID;
	}

	/**
	 * @param mixed $HiringCompanyID
	 * @return Company
	 */
	public function setHiringCompanyID($HiringCompanyID)
	{
		$this->HiringCompanyID = $HiringCompanyID;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getHiringCompanyWebpage()
	{
		return $this->HiringCompanyWebpage;
	}

	/**
	 * @param mixed $HiringCompanyWebpage
	 * @return Company
	 */
	public function setHiringCompanyWebpage($HiringCompanyWebpage)
	{
		$this->HiringCompanyWebpage = $HiringCompanyWebpage;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getHiringCompanySize()
	{
		return $this->HiringCompanySize;
	}

	/**
	 * @param mixed $HiringCompanySize
	 * @return Company
	 */
	public function setHiringCompanySize($HiringCompanySize)
	{
		$this->HiringCompanySize = $HiringCompanySize;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getHiringCompanyIndustry()
	{
		return $this->HiringCompanyIndustry;
	}

	/**
	 * @param mixed $HiringCompanyIndustry
	 * @return Company
	 */
	public function setHiringCompanyIndustry($HiringCompanyIndustry)
	{
		$this->HiringCompanyIndustry = $HiringCompanyIndustry;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->Title;
	}

	/**
	 * @param mixed $Title
	 * @return Company
	 */
	public function setTitle($Title)
	{
		$this->Title = $Title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGivenName()
	{
		return $this->GivenName;
	}

	/**
	 * @param mixed $GivenName
	 * @return Company
	 */
	public function setGivenName($GivenName)
	{
		$this->GivenName = $GivenName;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFamilyName()
	{
		return $this->FamilyName;
	}

	/**
	 * @param mixed $FamilyName
	 * @return Company
	 */
	public function setFamilyName($FamilyName)
	{
		$this->FamilyName = $FamilyName;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPositionTitle()
	{
		return $this->PositionTitle;
	}

	/**
	 * @param mixed $PositionTitle
	 * @return Company
	 */
	public function setPositionTitle($PositionTitle)
	{
		$this->PositionTitle = $PositionTitle;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCountryCode()
	{
		return $this->CountryCode;
	}

	/**
	 * @param mixed $CountryCode
	 * @return Company
	 */
	public function setCountryCode($CountryCode)
	{
		$this->CountryCode = $CountryCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRegion()
	{
		return $this->Region;
	}

	/**
	 * @param mixed $Region
	 * @return Company
	 */
	public function setRegion($Region)
	{
		$this->Region = $Region;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPostalCode()
	{
		return $this->PostalCode;
	}

	/**
	 * @param mixed $PostalCode
	 * @return Company
	 */
	public function setPostalCode($PostalCode)
	{
		$this->PostalCode = $PostalCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMunicipality()
	{
		return $this->Municipality;
	}

	/**
	 * @param mixed $Municipality
	 * @return Company
	 */
	public function setMunicipality($Municipality)
	{
		$this->Municipality = $Municipality;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStreetName()
	{
		return $this->StreetName;
	}

	/**
	 * @param mixed $StreetName
	 * @return Company
	 */
	public function setStreetName($StreetName)
	{
		$this->StreetName = $StreetName;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIntlCode()
	{
		return $this->IntlCode;
	}

	/**
	 * @param mixed $IntlCode
	 * @return Company
	 */
	public function setIntlCode($IntlCode)
	{
		$this->IntlCode = $IntlCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAreaCode()
	{
		return $this->AreaCode;
	}

	/**
	 * @param mixed $AreaCode
	 * @return Company
	 */
	public function setAreaCode($AreaCode)
	{
		$this->AreaCode = $AreaCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTelNumber()
	{
		return $this->TelNumber;
	}

	/**
	 * @param mixed $TelNumber
	 * @return Company
	 */
	public function setTelNumber($TelNumber)
	{
		$this->TelNumber = $TelNumber;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEMail()
	{
		return $this->EMail;
	}

	/**
	 * @param mixed $EMail
	 * @return Company
	 */
	public function setEMail($EMail)
	{
		$this->EMail = $EMail;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGeneralWebSite()
	{
		return $this->GeneralWebSite;
	}

	/**
	 * @param mixed $GeneralWebSite
	 * @return Company
	 */
	public function setGeneralWebSite($GeneralWebSite)
	{
		$this->GeneralWebSite = $GeneralWebSite;
		return $this;
	}


	/**
	 * @param string $certificateFilePath
	 * @return Company
	 */
	public function setCertificateFilePath(string $certificateFilePath)
	{
		$this->certificateFilePath = $certificateFilePath;
		return $this;
	}

	/**
	 * @param string $companyName
	 * @return Company
	 */
	public function setCompanyName(string $companyName)
	{
		$this->companyName = $companyName;
		return $this;
	}

	/**
	 * @param string $supplierID
	 * @return Company
	 */
	public function setSupplierID(string $supplierID)
	{
		$this->supplierID = $supplierID;
		return $this;
	}

	/**
	 * @param string $allianzpartnerNumber
	 * @return Company
	 */
	public function setAllianzpartnerNumber(string $allianzpartnerNumber)
	{
		$this->allianzpartnerNumber = $allianzpartnerNumber;
		return $this;
	}

	/**
	 * @param string $pin
	 * @return Company
	 */
	public function setPIN(string $pin)
	{
		$this->pin = $pin;
		return $this;
	}


	/** @return string file path */
	public function getCertificateFile()
	{
		if (isset($this->certificateFilePath)) {
			return $this->certificateFilePath;
		}
		throw new \Exception('Certificate File Path not defined, please use setCertificateFile() method');
	}

	/** @return string */
	public function getCompanyName()
	{
		if (isset($this->companyName)) {
			return $this->companyName;
		}
		throw new \Exception('Company Name not defined, please use setCompanyName() method');
	}

	/** @return string */
	public function getSupplierID()
	{
		if (isset($this->supplierID)) {
			return $this->supplierID;
		}
		throw new \Exception('Supplier ID not defined, please use setSupplierID() method');
	}

	/** @return string */
	public function getAllianzpartnerNumber()
	{
		if (isset($this->allianzpartnerNumber)) {
			return $this->allianzpartnerNumber;
		}
		throw new \Exception('Allianzpartner Number not defined, please use setAllianzpartnerNumber() method');
	}


	/** @return string */
	public function getPIN()

	{
		if (isset($this->pin)) {
			return $this->pin;
		}
		throw new \Exception('PIN Number not defined, please use setPIN() method');
	}

	public function isValid()
	{
		if (empty($this->getCompanyName())) {
			throw new \Exception('Company Name is empty');
		}
		if (empty($this->getSupplierID())) {
			throw new \Exception('SupplierID is empty');
		}
		if (empty($this->getAllianzpartnerNumber())) {
			throw new \Exception('Allianzpartner Number Name is empty');
		}
		if (empty($this->getPIN())) {
			throw new \Exception('PIN is empty');
		}
		return true;
	}

	/**
	 * @return mixed
	 */
	public function getSalutation()
	{
		return $this->Salutation;
	}

	/**
	 * @param mixed $Salutation
	 */
	public function setSalutation($Salutation)
	{
		$this->Salutation = $Salutation;
		return $this;
	}
}