<?php

namespace kzorluoglu\Arbeitsagentur;


use kzorluoglu\Arbeitsagentur\Contract\JobInterface;
use kzorluoglu\Arbeitsagentur\Contract\RemoteInterface;

class XMLJob extends Job implements JobInterface
{

	/** @var string */
	private $filePath;

	/** @var string */
	private $filename;

	/** @var string */
	private $xml;

	public function getCompanyIndustry()
	{

		if($this->HiringCompanyIndustry){
			return "
			<Industry>
				<NAICS>{$this->HiringCompanyIndustry}</NAICS>
			</Industry>";
		}

		return;
	}

	public function getJobDurationFields(){

		$string = "";
		if($this->Job_TemporaryOrRegular == "1" | "3"){
			$string = "
			<TermLength>{$this->Job_TermLength}</TermLength>
			<TermDate>{$this->Job_TermDate->format('Y-m-d')}</TermDate>
			<TemporaryOrRegular>{$this->Job_TemporaryOrRegular}</TemporaryOrRegular>
			";
		}

		if($this->Job_TemporaryOrRegular == "2"){
			$string = "
			<TemporaryOrRegular>{$this->Job_TemporaryOrRegular}</TemporaryOrRegular>
			";
		}
		return $string;
	}

	public function getEducationFields(){
		$string = "";
		if($this->Job_EduDegree){
			$string .= "<EduDegree>{$this->Job_EduDegree}</EduDegree>";
		}
		if($this->Job_EduDegreeRequired){
			$string .= "<EduDegreeRequired>{$this->Job_EduDegreeRequired}</EduDegreeRequired>";
		}

		return $string;
	}

	public function getHandicap(){
		if($this->Job_Handicap){
		return "<Handicap>{$this->Job_Handicap}</Handicap>";
		}
	}
	public function generateXML()
	{
		$this->xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<HRBAXMLJobPositionPosting xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" >
	<Header>
		<SupplierId>{$this->SupplierId}</SupplierId>
		<Timestamp>{$this->Timestamp->format('Y-m-d\TH:i:s\Z')}</Timestamp>
		<Amount>1</Amount>
		<TypeOfLoad>F</TypeOfLoad>
		<PdfPreviewOnly>{$this->PdfPreview}</PdfPreviewOnly>
	</Header>
	<Data>
		<JobPositionPosting>
			<JobPositionPostingId>{$this->JobID}</JobPositionPostingId>
			<Boxnumber>a</Boxnumber>
			<HiringOrg>
				<HiringOrgName>{$this->HiringCompanyName}</HiringOrgName>
				<HiringOrgId>{$this->HiringCompanyID}</HiringOrgId>
				<ProfileWebSite>{$this->HiringCompanyWebpage}</ProfileWebSite>
				<HiringOrgSize>{$this->HiringCompanySize}</HiringOrgSize>
				{$this->getCompanyIndustry()}
				<Contact>
					<Salutation>{$this->Salutation}</Salutation>
					<GivenName>{$this->GivenName}</GivenName>
					<FamilyName>{$this->FamilyName}</FamilyName>
					<PositionTitle>{$this->PositionTitle}</PositionTitle>
					<PostalAddress>
						<CountryCode>{$this->CountryCode}</CountryCode>
						<PostalCode>{$this->PostalCode}</PostalCode>
						<Region>{$this->Region}</Region>
						<Municipality>{$this->Municipality}</Municipality>
						<StreetName>{$this->StreetName}</StreetName>
 					</PostalAddress>
					<VoiceNumber>
						<IntlCode>{$this->IntlCode}</IntlCode>
						<AreaCode>{$this->AreaCode}</AreaCode>
						<TelNumber>{$this->TelNumber}</TelNumber>
					</VoiceNumber>
					<EMail>{$this->EMail}</EMail>
					<GeneralWebSite>{$this->GeneralWebSite}</GeneralWebSite>
				</Contact>
			</HiringOrg>
			<PostDetail>
				<StartDate>{$this->PostStartDate->format('Y-m-d')}</StartDate>
				<EndDate>{$this->PostEndDate->format('Y-m-d')}</EndDate>
				<LastModificationDate>{$this->PostLastModificationDate->format('Y-m-d\TH:i:s\Z')}</LastModificationDate>
				<Status>{$this->Status}</Status>
				<Action>{$this->Action}</Action>
				<SupplierId>{$this->SupplierId}</SupplierId>
				<SupplierName>{$this->SupplierName}</SupplierName>
				<PostedBy>
					<Contact>
						<Company>{$this->HiringCompanyName}</Company>
						<Salutation>{$this->Salutation}</Salutation>
						<Title>{$this->Title}</Title>
						<GivenName>{$this->GivenName}</GivenName>
 						<FamilyName>{$this->FamilyName}</FamilyName>
						<PositionTitle>{$this->PositionTitle}</PositionTitle>
						<PostalAddress>
							<CountryCode>{$this->CountryCode}</CountryCode>
							<PostalCode>{$this->PostalCode}</PostalCode>
							<Region>{$this->Region}</Region>
							<Municipality>{$this->Municipality}</Municipality>
 							<StreetName>{$this->StreetName}</StreetName>
 						</PostalAddress>
						<VoiceNumber>
							<IntlCode>{$this->IntlCode}</IntlCode>
							<AreaCode>{$this->AreaCode}</AreaCode>
							<TelNumber>{$this->TelNumber}</TelNumber>
						</VoiceNumber>
						<EMail>{$this->EMail}</EMail>
						<JobContactWebSite>{$this->GeneralWebSite}</JobContactWebSite>
					</Contact>
				</PostedBy>
				<BASupervision>0</BASupervision>
				<SupervisionDesired>0</SupervisionDesired>
			</PostDetail>
			<JobPositionInformation>
				<JobPositionTitle>
					<TitleCode>{$this->Job_TitleCode}</TitleCode>
					<Degree>{$this->Job_Degree}</Degree>
				</JobPositionTitle>
				<JobPositionTitleDescription>{$this->Job_JobPositionTitle}</JobPositionTitleDescription>
				<JobOfferType>{$this->Job_JobOfferType}</JobOfferType>
				<SocialInsurance>{$this->Job_SocialInsurance}</SocialInsurance>
				<Objective>{$this->Job_Objective}</Objective>
				<EducationAuthorisation>{$this->Job_EducationAuthorisation}</EducationAuthorisation>
				<JobPositionDescription>
					<JobPositionLocation>
						<Location>
							<CountryCode>{$this->Job_CountryCode}</CountryCode>
							<PostalCode>{$this->Job_PostalCode}</PostalCode>
							<Region>{$this->Job_Region}</Region>
							<Municipality>{$this->Job_Municipality}</Municipality>
 							<StreetName>{$this->Job_StreetName}</StreetName>
						</Location>
					</JobPositionLocation>
					<Application>
						<KindOfApplication>{$this->Job_KindOfApplication}</KindOfApplication>
						<ApplicationStartDate>{$this->Job_ApplyStartDate->format('Y-m-d')}</ApplicationStartDate>
						<ApplicationEndDate>{$this->Job_ApplyEndDate->format('Y-m-d')}</ApplicationEndDate>
						<EnclosuresRequired>{$this->Job_Enclosures}</EnclosuresRequired>
					</Application>
 					<MiniJob>{$this->Job_MiniJob}</MiniJob>
					<Classification>
						<Schedule>
							<WorkingPlan>{$this->Job_WorkingPlan}</WorkingPlan>
						</Schedule>
						<Duration>
							{$this->getJobDurationFields()}
 						</Duration>
					</Classification>
				</JobPositionDescription>
				<JobPositionRequirements>
					<QualificationsRequired>
						<EducationQualifs>
						{$this->getEducationFields()}
						</EducationQualifs>
						<LanguageQualifs>
							<Language>
								<LanguageName>{$this->Job_LanguageName}</LanguageName>
								<LanguageLevel>{$this->Job_LanguageLevel}</LanguageLevel>
                        	</Language>
						</LanguageQualifs>
						<SkillQualifs>
							<HardSkill>
								<SkillName>{$this->Job_SkillName}</SkillName>
								<SkillLevel>{$this->Job_SkillLevel}</SkillLevel>
							</HardSkill>
						</SkillQualifs>
						<Mobility>
							<DrivingLicence>
								<DrivingLicenceName>{$this->Job_DrivingLicenceName}</DrivingLicenceName>
								<DrivingLicenceRequired>{$this->Job_DrivingLicenceRequired}</DrivingLicenceRequired>
							</DrivingLicence>
						</Mobility>
					</QualificationsRequired>
 					<TravelRequired>{$this->Job_TravelRequired}</TravelRequired>
					{$this->getHandicap()}

				</JobPositionRequirements>
				<NumberToFill>{$this->Job_NumberToFill}</NumberToFill>
				<AssignmentStartDate>{$this->Job_AssignmentStartDate->format('Y-m-d')}</AssignmentStartDate>
				<AssignmentEndDate>{$this->Job_AssignmentEndDate->format('Y-m-d')}</AssignmentEndDate>
			</JobPositionInformation>
		</JobPositionPosting>
	</Data>
</HRBAXMLJobPositionPosting>
XML;


	}

	protected function save()
	{
		$xmlObject = new \SimpleXMLElement($this->xml);
		return $xmlObject->asXML($this->filePath . $this->filename);
	}

	public function generate()
	{
		if (!isset($this->filePath)) {
			throw new \Exception('XML File Path not setted');
		}
		if (!isset($this->filename)) {
			throw new \Exception('XML Filename not setted');
		}
		$this->generateXML();
		return $this->save();
	}

	/**
	 * @return mixed false|string
	 */
	public function getAll()
	{
		return $this->getXMLFile();
	}

	public function getXMLFile()
	{
		return file_exists($this->getFilePath() . $this->getFilename()) ? file_get_contents($this->getFilePath() . $this->getFilename()) : false;
	}

	/**
	 * @return string
	 */
	public function getFilePath()
	{
		return $this->filePath;
	}

	/**
	 * @param string $filePath
	 */
	public function setFilePath($filePath)
	{
		$this->filePath = $filePath;
	}

	/**
	 * @return string
	 */
	public function getFilename()
	{
		return $this->filename;
	}

	/**
	 * @param string $filename
	 */
	public function setFilename($filename)
	{
		$this->filename = $filename;
	}

}
