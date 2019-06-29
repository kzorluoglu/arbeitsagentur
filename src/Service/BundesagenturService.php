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

    /** @var JobInterface */
    private $job;

    public function __construct()
    {
        $this->uploadUrl = 'https://hrbaxml.arbeitsagentur.de/in/upload.php?upload=';
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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->uploadUrl . $this->job->getFilePath());
        // The --cert option
        curl_setopt($ch, CURLOPT_SSLCERT, $this->company->getCertificateFile());
        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $this->company->getPIN());
        $result = curl_exec($ch);
        // also get the error and response code
        $errors = curl_error($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (isset($errors)) {
            return $errors;
        }
        return $response;
    }


}