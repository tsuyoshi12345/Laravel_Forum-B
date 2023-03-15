<?php

namespace App\Repositories;

use App\Models\ThreadSecondaryCategory;

class ThreadSecondaryCategoryRepository
{
    /**
     * 対応する大枠カテゴリを取得する
     *
     * @param int $id 大枠カテゴリのID
     * @param array $with 追加で取得するリレーション
     * @param array $withCount カウントするリレーションの関連モデル
     * @return ThreadSecondaryCategory 対応する大枠カテゴリを取得する
     */
    public static function find(int $id, array $with = [], array $withCount = []): ThreadSecondaryCategory
    {
        return ThreadSecondaryCategory::with($with)
            ->withCount($withCount)
            ->find($id);
    }

    /**
     * 詳細カテゴリ名からIDを取得する
     *
     * @param string $threadSecondaryCategoryName 詳細カテゴリ名
     * @return integer|null 詳細カテゴリのID
     */
    public static function nameToId(string $threadSecondaryCategoryName): int | null
    {
        return ThreadSecondaryCategory::where([
            ['name', $threadSecondaryCategoryName]
        ])->first()->id ?? null;
    }
}
