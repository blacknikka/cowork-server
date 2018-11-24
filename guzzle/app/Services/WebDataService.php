<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\WebData\WebDataProviderInterface;

class WebDataService
{
    private $webData;

    public function __construct(WebDataProviderInterface $webData)
    {
        $this->webData = $webData;
    }

    public function setWebDataToStore($store)
    {
        return $this->webData->setWebDataToStore($store);
    }

    public function getAllData()
    {
        return $this->webData->getAllData();
    }

    public function getDataByStoreName($name)
    {
        return $this->webData->getDataByStoreName($name);
    }
}
