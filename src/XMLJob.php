<?php

namespace kzorluoglu\Arbeitsagentur;


use kzorluoglu\Arbeitsagentur\Contract\JobInterface;
use kzorluoglu\Arbeitsagentur\Contract\RemoteInterface;

class XMLJob extends Job implements JobInterface
{
    /** @var string */
    private $fileFullPath;

    public function generateXMLFile()
    {
        $xmlTree = new \DOMDocument('1.0', 'UTF-8');

        $HRBAXMLJobPositionPosting = $this->generateRoot($xmlTree);

        $data = $this->generateData($xmlTree);
        $header = $this->generateHead($xmlTree);

        $HRBAXMLJobPositionPosting->appendChild($header);
        $xmlTree->appendChild($HRBAXMLJobPositionPosting);

        $HRBAXMLJobPositionPosting->appendChild($data);
        $xmlTree->appendChild($HRBAXMLJobPositionPosting);

        $xmlTree->preserveWhiteSpace = false;
        $xmlTree->formatOutput = true;
        echo $xmlTree->save($this->getFileFullPath());

    }

    public function generateData(\DOMDocument $xmlTree): \DOMElement
    {
        $data = $xmlTree->createElement('Data');

        $JobPositionPosting = $xmlTree->createElement('JobPositionPosting');

        $JobPositionPostingId = $xmlTree->createElement('JobPositionPostingId', $this->PositionPostingId);
        $JobPositionPosting->appendChild($JobPositionPostingId);

        /** PostDetail START */
        $PostDetail = $xmlTree->createElement('PostDetail');

        $StartDate = $xmlTree->createElement('StartDate', $this->StartDate->format('Y-m-dTH:m:sZ'));
        $PostDetail->appendChild($StartDate);

        $EndDate = $xmlTree->createElement('EndDate', $this->EndDate->format('Y-m-dTH:m:sZ'));
        $PostDetail->appendChild($EndDate);

        $Status = $xmlTree->createElement('Status', $this->Status);
        $PostDetail->appendChild($Status);

        $SupplierId = $xmlTree->createElement('SupplierId', $this->SupplierId);
        $PostDetail->appendChild($SupplierId);

        $SupplierName = $xmlTree->createElement('SupplierName', $this->SupplierId);
        $PostDetail->appendChild($SupplierName);

        $SupplierIndustrie = $xmlTree->createElement('SupplierIndustrie', $this->SupplierIndustrie);
        $PostDetail->appendChild($SupplierIndustrie);

        $JobPositionPosting->appendChild($PostDetail);
        /** PostDetail END */

        /** JobPositionInformation START */
        $JobPositionInformation = $xmlTree->createElement('JobPositionInformation');

        /**  JobPositionTitle  Start */
        $JobPositionTitle = $xmlTree->createElement('JobPositionTitle');
        $JobPositionInformation->appendChild($JobPositionTitle);

        $TitleCode = $xmlTree->createElement('TitleCode', $this->JobPositionTitle->TitleCode);
        $JobPositionTitle->appendChild($TitleCode);

        $Degree = $xmlTree->createElement('Degree', $this->JobPositionTitle->Degree);
        $JobPositionTitle->appendChild($Degree);
        $JobPositionInformation->appendChild($JobPositionTitle);

        /**  JobPositionTitle  End */
        /**  AlternativeJobPositionTitle  Start */
        $AlternativeJobPositionTitle = $xmlTree->createElement('AlternativeJobPositionTitle');

        $TitleCode = $xmlTree->createElement('TitleCode', $this->AlternativeJobPositionTitle->TitleCode);
        $AlternativeJobPositionTitle->appendChild($TitleCode);

        $Degree = $xmlTree->createElement('Degree', $this->AlternativeJobPositionTitle->Degree);
        $AlternativeJobPositionTitle->appendChild($Degree);
        $JobPositionInformation->appendChild($AlternativeJobPositionTitle);
        /**  JobPositionTitle  End */

        $JobPositionTitleDescription = $xmlTree->createElement('JobPositionTitleDescription', $this->JobPositionTitleDescription);
        $JobPositionInformation->appendChild($JobPositionTitleDescription);

        $JobOfferType = $xmlTree->createElement('JobOfferType', $this->JobOfferType);
        $JobPositionInformation->appendChild($JobOfferType);

        $SocialInsurance = $xmlTree->createElement('SocialInsurance', $this->SocialInsurance);
        $JobPositionInformation->appendChild($SocialInsurance);

        /** JobPositionDescription Start **/
        $JobPositionDescription = $xmlTree->createElement('JobPositionDescription');
        $JobPositionLocation = $xmlTree->createElement('JobPositionLocation');
        $JobPositionDescription->appendChild($JobPositionLocation);
        $Location = $xmlTree->createElement('Location');
        $JobPositionLocation->appendChild($Location);
        $CountryCode = $xmlTree->createElement('CountryCode', $this->CountryCode);
        $Location->appendChild($CountryCode);
        $PostalCode = $xmlTree->createElement('PostalCode', $this->PostalCode);
        $Location->appendChild($PostalCode);
        $Region = $xmlTree->createElement('Region', $this->Region);
        $Location->appendChild($Region);
        $AddressLine = $xmlTree->createElement('AddressLine', $this->AddressLine);
        $Location->appendChild($AddressLine);
        $StreetName = $xmlTree->createElement('StreetName', $this->StreetName);
        $Location->appendChild($StreetName);
        $JobPositionInformation->appendChild($JobPositionDescription);

        $Application = $xmlTree->createElement('Application');
          $ApplicationStartDate = $xmlTree->createElement('ApplicationStartDate', $this->ApplicationStartDate->format('Y-m-dTH:m:sZ'));
        $Application->appendChild($ApplicationStartDate);
        $ApplicationEndDate = $xmlTree->createElement('ApplicationEndDate', $this->ApplicationEndDate->format('Y-m-dTH:m:sZ'));
        $Application->appendChild($ApplicationEndDate);
        $JobPositionDescription->appendChild($Application);

        $Leadership = $xmlTree->createElement('Leadership', $this->Leadership);
        $JobPositionDescription->appendChild($Leadership);

        $MiniJob = $xmlTree->createElement('MiniJob', $this->MiniJob);
        $JobPositionDescription->appendChild($MiniJob);

        $Classification = $xmlTree->createElement('Classification');
        $Duration = $xmlTree->createElement('Duration');
        $TermLength = $xmlTree->createElement('TermLength', $this->TermLength);
        $Duration->appendChild($TermLength);
        $TermDate = $xmlTree->createElement('TermDate', $this->TermDate->format('Y-m-dTH:m:sZ'));
        $Duration->appendChild($ApplicationStartDate);
        $TemporaryOrRegular = $xmlTree->createElement('TemporaryOrRegular', $this->TemporaryOrRegular);
        $Duration->appendChild($TemporaryOrRegular);
        $Classification->appendChild($Duration);
        $JobPositionDescription->appendChild($Classification);

        $CompensationDescription = $xmlTree->createElement('CompensationDescription');
        $Salary = $xmlTree->createElement('Salary', $this->Salary);
        $CompensationDescription->appendChild($Salary);

        $JobPositionDescription->appendChild($CompensationDescription);
        /** JobPositionDescription End **/

        /** JobPositionRequirements Start */
        $JobPositionRequirements = $xmlTree->createElement('JobPositionRequirements');
        $QualificationsRequired = $xmlTree->createElement('QualificationsRequired');
        $JobPositionRequirements->appendChild($QualificationsRequired);
        $EducationQualifs = $xmlTree->createElement('EducationQualifs');
        $QualificationsRequired->appendChild($EducationQualifs);
        $EduDegree = $xmlTree->createElement('EduDegree', $this->EducationQualifs->EduDegree);
        $EducationQualifs->appendChild($EduDegree);
        $EduDegreeRequired = $xmlTree->createElement('EduDegreeRequired', $this->EducationQualifs->EduDegreeRequired);
        $EducationQualifs->appendChild($EduDegreeRequired);
        $ManagementQualifs = $xmlTree->createElement('ManagementQualifs');
        $QualificationsRequired->appendChild($ManagementQualifs);
        $LeadershipType = $xmlTree->createElement('LeadershipType', $this->ManagementQualifs->LeadershipType);
        $ManagementQualifs->appendChild($LeadershipType);
        $Authority = $xmlTree->createElement('Authority', $this->ManagementQualifs->Authority);
        $ManagementQualifs->appendChild($Authority);
        $LeadershipEx = $xmlTree->createElement('LeadershipEx', $this->ManagementQualifs->LeadershipEx);
        $ManagementQualifs->appendChild($LeadershipEx);
        $BudgetResp = $xmlTree->createElement('BudgetResp', $this->ManagementQualifs->BudgetResp);
        $ManagementQualifs->appendChild($BudgetResp);
        $EmployeeResp = $xmlTree->createElement('EmployeeResp', $this->ManagementQualifs->EmployeeResp);
        $ManagementQualifs->appendChild($EmployeeResp);

        $LanguageQualifs = $xmlTree->createElement('LanguageQualifs');
        $QualificationsRequired->appendChild($LanguageQualifs);
        $Language = $xmlTree->createElement('Language');
        $LanguageQualifs->appendChild($Language);
        $LanguageName = $xmlTree->createElement('LanguageName', $this->Language->LanguageName);
        $Language->appendChild($LanguageName);
        $LanguageLevel = $xmlTree->createElement('LanguageLevel', $this->Language->LanguageLevel);
        $Language->appendChild($LanguageLevel);
        $SkillQualifs = $xmlTree->createElement('SkillQualifs');
        $QualificationsRequired->appendChild($SkillQualifs);
        $HardSkill = $xmlTree->createElement('HardSkill');
        $SkillQualifs->appendChild($HardSkill);

        $SkillName = $xmlTree->createElement('SkillName',  $this->HardSkill->SkillName);
        $HardSkill->appendChild($SkillName);
        $SkillLevel = $xmlTree->createElement('SkillLevel', $this->HardSkill->SkillLevel);
        $HardSkill->appendChild($SkillLevel);
        $SoftSkill = $xmlTree->createElement('SoftSkill');
        $SkillQualifs->appendChild($SoftSkill);
        $SkillName = $xmlTree->createElement('SkillName', $this->SoftSkill->SkillLevel);
        $SoftSkill->appendChild($SkillName);

        $Mobility = $xmlTree->createElement('Mobility');
        $QualificationsRequired->appendChild($Mobility);

        $DrivingLicence = $xmlTree->createElement('DrivingLicence', $this->DrivingLicence);
        $Mobility->appendChild($DrivingLicence);
        $DrivingLicenceRequired = $xmlTree->createElement('DrivingLicenceRequired', $this->DrivingLicenceRequired);
        $Mobility->appendChild($DrivingLicenceRequired);

        $TravelRequired = $xmlTree->createElement('TravelRequired', $this->TravelRequired);
        $JobPositionRequirements->appendChild($TravelRequired);

        $JobPositionInformation->appendChild($JobPositionRequirements);

        $NumberToFill = $xmlTree->createElement('NumberToFill', $this->NumberToFill);
        $JobPositionInformation->appendChild($NumberToFill);

        $AssignmentStartDate = $xmlTree->createElement('AssignmentStartDate', $this->AssignmentStartDate->format('Y-m-dTH:m:sZ'));
        $JobPositionInformation->appendChild($AssignmentStartDate);

        $AssignmentEndDate = $xmlTree->createElement('AssignmentEndDate', $this->AssignmentEndDate->format('Y-m-dTH:m:sZ'));
        $JobPositionInformation->appendChild($AssignmentEndDate);

        $JobPositionPosting->appendChild($JobPositionInformation);

        $data->appendChild($JobPositionPosting);

        return $xmlTree->appendChild($data);
    }

    /**
     * @param \DOMDocument $xmlTree
     * @return \DOMElement
     */
    public function generateHead(\DOMDocument $xmlTree): \DOMElement
    {
        $header = $xmlTree->createElement('Header');
        $SupplierId = $xmlTree->createElement('SupplierId', $this->SupplierId);
        $header->appendChild($SupplierId);

        $Timestamp = $xmlTree->createElement('Timestamp', $this->Timestamp->format('Y-m-dTH:m:sZ'));
        $header->appendChild($Timestamp);

        $Amount = $xmlTree->createElement('Amount', $this->Amount);
        $header->appendChild($Amount);

        $TypeOfLoad = $xmlTree->createElement('TypeOfLoad', $this->TypeOfLoad);
        $header->appendChild($TypeOfLoad);
        return $header;
    }

    /**
     * @param \DOMDocument $xmlTree
     * @return \DOMElement
     */
    public function generateRoot(\DOMDocument $xmlTree): \DOMElement
    {
        $HRBAXMLJobPositionPosting = $xmlTree->createElement('HRBAXMLJobPositionPosting');
        $attr_xmlns = new \DOMAttr('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $HRBAXMLJobPositionPosting->setAttributeNode($attr_xmlns);
        return $HRBAXMLJobPositionPosting;
    }

    /**
     * @return string
     */
    public function getFileFullPath(): string
    {
        return $this->fileFullPath;
    }

    public function generate()
    {
        if(!isset($this->fileFullPath)){
           throw new \Exception('XML File Full Path not setted');
        }

        $this->generateXMLFile();
    }

    public function getAll()
    {
        return $this->getXML();
    }

    public function getXML()
    {
        return file_exists($this->fileFullPath) ? file_get_contents($this->fileFullPath) : false;
    }


    /**
     * @param string $fileFullPath
     */
    public function setFileFullPath(string $fileFullPath)
    {
        $this->fileFullPath = $fileFullPath;
    }
}