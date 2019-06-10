<?php
namespace kzorluoglu\Arbeitsagentur\Contract;

interface JobInterface
{
    public function generate();

    public function getAll();

    public function getFileFullPath();

}