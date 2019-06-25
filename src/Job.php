<?php


namespace kzorluoglu\Arbeitsagentur;

use DateTime;

/**
 * @property string SupplierId
 * @property string SupplierName
 * @property DateTime Timestamp
 * @property string JobID
 * @property string HiringCompanyName
 * @property string HiringCompanyID
 * @property string HiringCompanyWebpage
 * @property int HiringCompanySize
 * @property string HiringCompanyIndustry
 * @property int Salutation
 * @property string Title
 * @property string GivenName
 * @property string FamilyName
 * @property string PositionTitle
 * @property string CountryCode
 * @property string PostalCode
 * @property string Municipality
 * @property int Region
 * @property string StreetName
 * @property string IntlCode
 * @property string AreaCode
 * @property string TelNumber
 * @property string EMail
 * @property string GeneralWebSite
 * @property DateTime PostStartDate
 * @property DateTime PostEndDate
 * @property DateTime PostLastModificationDate
 * @property int Status
 * @property int Action
 * @property string Job_TitleCode
 * @property string Job_Degree
 * @property string Job_JobPositionTitle
 * @property string Job_JobOfferType
 * @property int Job_SocialInsurance
 * @property string Job_Objective
 * @property int Job_EducationAuthorisation
 * @property string Job_CountryCode
 * @property string Job_PostalCode
 * @property int Job_Region
 * @property string Job_Municipality
 * @property string Job_StreetName
 * @property int Job_KindOfApplication
 * @property DateTime Job_ApplyStartDate
 * @property DateTime Job_ApplyEndDate
 * @property string Job_Enclosures
 * @property int Job_MiniJob
 * @property int Job_WorkingPlan
 * @property string Job_TermLength
 * @property DateTime Job_TermDate
 * @property string Job_EduDegree
 * @property int Job_EduDegreeRequired
 * @property string Job_LanguageName
 * @property int Job_LanguageLevel
 * @property string Job_SkillName
 * @property int Job_SkillLevel
 * @property string Job_DrivingLicenceName
 * @property int Job_DrivingLicenceRequired
 * @property int Job_TravelRequired
 * @property int Job_Handicap
 * @property int Job_NumberToFill
 * @property DateTime Job_AssignmentStartDate
 * @property DateTime Job_AssignmentEndDate
 *
 */
class Job
{
    private $attribute = array();

    public function __get($name)
    {
        if (array_key_exists($name, $this->attribute)) {
            return $this->attribute[$name];
        }

        return null;
    }

    public function __set($name, $value)
    {

        $this->attribute[$name] = $value;
    }
}