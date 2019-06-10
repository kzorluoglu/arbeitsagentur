<?php
namespace kzorluoglu\Arbeitsagentur\Service;

use kzorluoglu\Arbeitsagentur\Contract\JobInterface;
use kzorluoglu\Arbeitsagentur\XMLJob;

class JobService
{
    public function __construct(JobInterface $job)
    {
        $this->job = $job;
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


}