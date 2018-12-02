<?php
declare(strict_types=1);

namespace App\DataProvider\WebData;

use Illuminate\Support\Facades\DB;
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
        $result = DB::transaction(function () use ($store) {
            try {
                foreach ($store as $value) {
                    $data = DB::table('store')
                        ->where('name', '=', $value['name'])
                        ->count();

                    $updateData = [
                        'name' => $value['name'],
                        'address' => $value['address'],
                        'open' => $value['time'],
                    ];

                    if (0 < $data) {
                        // update
                        DB::table('store')
                            ->where('name', '=', $value['name'])
                            ->update($updateData);
                    } else {
                        // insert
                        DB::table('store')
                            ->insert($updateData);
                    }
                }
            } catch (\Exception $e) {
                return [
                    'result' => false,
                    'count' => null,
                ];
            }

            return [
                'result' => true,
                'count' => count($store),
            ];
        });

        return $result;
    }

    /**
     * 全てのデータを取得する
     *
     * @return void
     */
    public function getAllData()
    {
        $results = DB::table('store')
            ->select([
                'name',
                'address',
                'open'
            ])
            ->get();

        $ret = [];
        foreach ($results as $result) {
            $ret[] = [
                'name' => $result->name,
                'type' => $result->address,
                'count' => $result->open,
            ];
        }

        return $ret;
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
