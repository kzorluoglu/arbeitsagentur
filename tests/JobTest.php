<?php

use PHPUnit\Framework\TestCase;
use kzorluoglu\Arbeitsagentur\Service\BundesagenturService;
use kzorluoglu\Arbeitsagentur\XMLJob;
use kzorluoglu\Arbeitsagentur\Company;

class JobTest extends TestCase
{
    /** @var BundesagenturService */
    private $bundesagenturService;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return Company
     */
    private function getCompany()
    {
        $company = new Company;
        $company->setCertificateFilePath(__DIR__ . '/test.pem')
            ->setCompanyName('V123456')
            ->setSupplierID('V123456')
            ->setAllianzpartnerNumber('123456')
            ->setPIN('%&!RANDOM&PIN!&%')
            ->setHiringCompanyID('1234567')
            ->setHiringCompanyWebpage('http://test.com')
            ->setHiringCompanySize(3)
            ->setHiringCompanyIndustry('01')
            ->setSalutation('Herr')
            ->setTitle(NULL)
            ->setGivenName('Max')
            ->setFamilyName('Mustermann')
            ->setPositionTitle(NULL)
            ->setCountryCode('DE')
            ->setRegion(1)
            ->setPostalCode('33333')
            ->setMunicipality('Musterstadt')
            ->setStreetName('Musterstrasse 3')
            ->setIntlCode('+49')
            ->setAreaCode('333')
            ->setTelNumber('333333333')
            ->setEMail('test@test.com')
            ->setGeneralWebSite('http://test.com');
        return $company;
    }

    /**
     * @param Company $company
     * @return XMLJob
     * @throws Exception
     */
    private function getXMLJob(Company $company)
    {
        $job = new XMLJob();
        $job->SupplierId = $company->getSupplierID();
        $job->Timestamp = new \DateTime('now');
        $job->JobID = 3333;
        $job->HiringCompanyName = $company->getCompanyName();
        $job->HiringCompanyID = $company->getHiringCompanyID(); // ID des betreuten Arbeitgeber-Accounts in der JOBBÖRSE (Kundennummer)
        $job->HiringCompanyWebpage = $company->getHiringCompanyWebpage();
        $job->HiringCompanySize = $company->getHiringCompanySize();
        $job->HiringCompanyIndustry = $company->getHiringCompanyIndustry();
        $job->Salutation = $company->getSalutation();
        $job->Title = $company->getTitle();
        $job->GivenName = $company->getGivenName();
        $job->FamilyName = $company->getFamilyName();
        $job->PositionTitle = $company->getPositionTitle();
        $job->CountryCode = $company->getCountryCode();
        $job->Region = $company->getRegion();
        $job->PostalCode = $company->getPostalCode();
        $job->Municipality = $company->getMunicipality();
        $job->StreetName = $company->getStreetName();
        $job->IntlCode = $company->getIntlCode();
        $job->AreaCode = $company->getAreaCode();
        $job->TelNumber = $company->getTelNumber();
        $job->EMail = $company->getEMail();
        $job->GeneralWebSite = $company->getGeneralWebSite();

        $job->PostStartDate = new \DateTime('now'); // Date for offer show
        $job->PostEndDate = new \DateTime('tomorrow');             // Date for offer end
        $job->PostLastModificationDate = new \DateTime('now');  // Date for offer modification
        $job->Status = 1;             // Share public  // Select
        $job->Action = 1;             // Insert new offer  // Select
        $job->SupplierName = "A000000000";  // Suppliername from

        $job->Job_TitleCode = "Muster Job";  //Muster Jobbörse Firma GMBH
        $job->Job_Degree = 1;  // Select
        $job->Job_JobPositionTitle = "Fachhochschule Muster Meister";
        $job->Job_JobOfferType = 1;  // Select
        $job->Job_SocialInsurance = 1;  // Select
        $job->Job_Objective = "This is a description place with maximum 4000 Character";
        $job->Job_EducationAuthorisation = 1;  // Select

        $job->Job_CountryCode = "DE";  // Select
        $job->Job_Region = 1;  // Select
        $job->Job_PostalCode = "79555";
        $job->Job_Municipality = "Lörrach";
        $job->Job_StreetName = "Musterstraße 3";

        $job->Job_KindOfApplication = 3;  // Select
        $job->Job_ApplyStartDate = new \DateTime('now');
        $job->Job_ApplyEndDate = new \DateTime('tomorrow');
        $job->Job_Enclosures = "Please with CV sending";

        $job->Job_MiniJob = 1;  // Select
        $job->Job_WorkingPlan = 1;  // Select

        $job->Job_TermLength = 24; // Month Count
        $job->Job_TermDate = new \DateTime('now');
        $job->Job_TermDate->modify('+1 year');

        $job->Job_EduDegree = 2; // Select
        $job->Job_EduDegreeRequired = 1; // Select

        $job->Job_LanguageName = 2; // Select
        $job->Job_LanguageLevel = 1; // Select

        $job->Job_DrivingLicenceName = 2; // Select
        $job->Job_DrivingLicenceRequired = 1; // Select

        $job->Job_SkillName = 2; // Select
        $job->Job_SkillLevel = 1; // Select

        $job->Job_TravelRequired = 1; // Select
        $job->Job_Handicap = 1; // Select
        $job->Job_NumberToFill = 33;

        $job->Job_AssignmentStartDate = new \DateTime('now');
        $job->Job_AssignmentEndDate = new \DateTime('now');
        $job->Job_AssignmentEndDate->modify('+30 Day');
        return $job;
    }

    public function testExportXML()
    {
        $company = $this->getCompany();
        $xmlJob = $this->getXMLJob($company);
        $xmlJob->setFilePath(__DIR__ . '\\unittest.xml');

        $this->bundesagenturService = new BundesagenturService();
        $this->bundesagenturService->setJob($xmlJob);
        $jobs = $this->bundesagenturService->generate()->getAll();

        $this->assertSame($jobs, $xmlJob->getXMLFile());
    }

    public function testXMLJobPrepare()
    {
        $company = $this->getCompany();
        $xmlJob = $this->getXMLJob($company);
        $xmlJob->setFilePath(__DIR__ . '\\unittest.xml');
        $this->bundesagenturService = new BundesagenturService();
        $this->bundesagenturService->setCompany($company);
        $this->bundesagenturService->setJob($xmlJob);

        $this->assertTrue($this->bundesagenturService->isValid());
    }

    public function testXMLJobUpload()
    {
        $company = $this->getCompany();
        $xmlJob = $this->getXMLJob($company);
        $xmlJob->setFilePath(__DIR__ . '\\unittest.xml');

        $this->bundesagenturService = new BundesagenturService();
        $this->bundesagenturService->setCompany($company);
        $this->bundesagenturService->setJob($xmlJob);
        $status = $this->bundesagenturService->upload();
        $this->assertSame($status, 'could not load PEM client certificate, OpenSSL error error:02001002:system library:fopen:No such file or directory, (no key found, wrong pass phrase, or wrong file format?)');
    }

}
