<?php
declare(strict_types=1);

namespace App\DataProvider\WebData;

interface WebDataProviderInterface
{
    /**
     * Webからのデータをデータストアに登録
     *
     * @param Array $store
     * @return void
     */
    public function setWebDataToStore($store);

    /**
     * 全てのデータを取得する
     *
     * @return void
     */
    public function getAllData();

    /**
     * 店名からデータを取得する
     *
     * @param Array $name
     * @return void
     */
    public function getDataByStoreName($name);
}
