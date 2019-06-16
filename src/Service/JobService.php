<?php
namespace kzorluoglu\Arbeitsagentur\Service;

use Dotenv\Dotenv;
use kzorluoglu\Arbeitsagentur\Company;
use kzorluoglu\Arbeitsagentur\Contract\JobInterface;

class JobService
{
    /** @var Company $company */
    private $company;

    /**
     * JobService constructor.
     * @param JobInterface $job
     */
    public function __construct(JobInterface $job){
        $this->job = $job;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
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

    public function importAll()
    {
        // TODO: Implement importAll() method.
    }

    public function upload()
    {
        $url = 'https://hrbaxml.arbeitsagentur.de/in/upload.php?upload='.$this->job->getFileFullPath();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // The --cert option
        curl_setopt($ch, CURLOPT_SSLCERT, $this->company->getCertificateFile());
        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $this->company->getPIN());
        $result  = curl_exec($ch);
        // also get the error and response code
        $errors = curl_error($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if(isset($errors)){
            return $errors;
        }
        return $response;
    }


}