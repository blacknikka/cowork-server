<?php
declare(strict_types=1);

namespace App\DataProvider\WebData;

use App\DataProvider\WebData\WebDataProviderInterface;

class WebDataProvider implements WebDataProviderInterface
{
    /**
     * Webからのデータをデータストアに登録
     *
     * @param Array $store
     * @return void
     */
    public function setWebDataToStore($store)
    {
        return 'setWebDataToStore';
    }

    /**
     * 全てのデータを取得する
     *
     * @return void
     */
    public function getAllData()
    {
    }

    /**
     * 店名からデータを取得する
     *
     * @param Array $name
     * @return void
     */
    public function getDataByStoreName($name)
    {
    }
}
