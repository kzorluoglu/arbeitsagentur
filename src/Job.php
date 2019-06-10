<?php


namespace kzorluoglu\Arbeitsagentur;


/**
 * @property mixed|null SupplierId
 * @property \DateTime Timestamp
 * @property mixed|null Amount
 * @property mixed|null TypeOfLoad
 * @property mixed|null JobPositionPostingId
 * @property \DateTime  StartDate
 * @property \DateTime  EndDate
 * @property mixed|null Status
 * @property mixed|null SupplierName
 * @property mixed|null SupplierIndustrie
 * @property array|null JobPositionTitle
 * @property array|null AlternativeJobPositionTitle
 * @property mixed|null JobPositionTitleDescription
 * @property mixed|null JobOfferType
 * @property mixed|null SocialInsurance
 * @property mixed|null CountryCode
 * @property mixed|null PostalCode
 * @property mixed|null Region
 * @property mixed|null AddressLine
 * @property mixed|null StreetName
 * @property mixed|null Leadership
 * @property mixed|null MiniJob
 * @property mixed|null TermLength
 * @property \DateTime TermDate
 * @property \DateTime  ApplicationStartDate
 * @property \DateTime  ApplicationEndDate
 * @property mixed|null TemporaryOrRegular
 * @property mixed|null Salary
 * @property array|null EducationQualifs
 * @property array|null ManagementQualifs
 * @property array|null Language
 * @property array|null HardSkill
 * @property array|null SoftSkill
 * @property mixed|null DrivingLicence
 * @property mixed|null DrivingLicenceRequired
 * @property mixed|null TravelRequired
 * @property mixed|null NumberToFill
 * @property \DateTime  AssignmentStartDate
 * @property \DateTime  AssignmentEndDate
 */
class Job
{
    private $attribute = array();

    public function __get($name)
    {
        if(array_key_exists($name, $this->attribute))
        {
            return $this->attribute[$name];
        }

        return null;
    }

    public function __set($name, $value)
    {

            $this->attribute[$name] = $value;

    }
}