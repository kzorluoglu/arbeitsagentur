<?php
namespace kzorluoglu\Arbeitsagentur\Service;

use kzorluoglu\Arbeitsagentur\Contract\JobInterface;

class JobService
{

    /**
     * JobService constructor.
     * @param JobInterface $job
     */
    public function __construct(JobInterface $job){
        $this->job = $job;
    }

    public function isValidRequest()
    {
        return $this->job->isValidRequest();
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
        return $this->job->upload();
    }


}