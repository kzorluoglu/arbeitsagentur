<?php

namespace kzorluoglu\Arbeitsagentur\Service;

use Dotenv\Dotenv;
use kzorluoglu\Arbeitsagentur\Company;
use kzorluoglu\Arbeitsagentur\Contract\JobInterface;
use kzorluoglu\Arbeitsagentur\Job;

class BundesagenturService
{
	/** @var Company $company */
	private $company;

	/** @var string */
	private $uploadUrl;

	/** @var string */
	private $apiUrl;

	public function __construct()
	{
		$this->uploadUrl = 'https://hrbaxml.arbeitsagentur.de/in/upload.php';
		$this->apiUrl = 'https://hrbaxml.arbeitsagentur.de/';
	}

	/**
	 * @param Company $company
	 */
	public function setCompany(Company $company)
	{
		$this->company = $company;
		return;
	}

	/**
	 * @param Company $company
	 */
	public function setJob(JobInterface $job)
	{
		$this->job = $job;
		return;
	}

	public function isValid()
	{
		return $this->company->isValid();
	}

	public function generate()
	{
		$this->job->generate();
		return $this;
	}

	public function getAll()
	{
		return $this->job->getAll();
	}

	public function upload()
	{
		return true;
		$fp = fopen($this->job->getFilePath() . '/log.txt', 'w');
		$cfile = new \CURLFile($this->job->getFilePath() . $this->job->getFilename());

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->uploadUrl);
		// The --cert option
		curl_setopt($ch, CURLOPT_SSLCERT, $this->company->getCertificateFile());
		curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $this->company->getPIN());
		curl_setopt($ch, CURLOPT_POST, true); // enable posting
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('upload' => $cfile));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_FILE, $fp);

		$result = curl_exec($ch);
		// also get the error and response code
		$errors = curl_error($ch);
		$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if (!empty($errors)) {
			throw new \Exception($errors);
		}

		if($response === 200){
			return true;
		}
	}

	/**
	 * @param string $fileName Full File name
	 */
	public function downloadFile($fileName)
	{

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->apiUrl.$fileName);
		// The --cert option
		curl_setopt($ch, CURLOPT_SSLCERT, $this->company->getCertificateFile());
		curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $this->company->getPIN());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);

		$result = curl_exec($ch);
		$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);
		if($response === 200){
			$fp = fopen (TL_ROOT . '/jobcenter/' . $fileName, 'w+') or die('Unable to write a file');
			fputs($fp, $result);
			fclose($fp);
			return true;
		}else{
			return false;
		}

	}


}
