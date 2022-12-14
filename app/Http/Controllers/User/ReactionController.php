<?php

namespace App\Http\Controllers\User;

use App\Consts\ReactionConst;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public static function isDefault($user_id, $news_id, $status)
    {
        return DB::table('reactions')
            ->where('user_id', $user_id)
            ->where('news_id', $news_id)
            ->where('status', $status)->exists();
    }

    public function like(Request $request)
    {
        $user_id = Auth::id();
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);

        $status = self::isDefault($user_id, $news_id, ReactionConst::LIKE)
        ? ReactionConst::NONE
        : ReactionConst::LIKE;

        DB::table('reactions')->updateOrInsert(
            [
                'user_id' => $user_id,
                'news_id' => $news_id
            ],
            ['status' => $status]
        );

        $json = $this->countReactions($news);
        return response()->json($json);
    }

    public function dislike(Request $request)
    {
        $user_id = Auth::id();
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);

        $status = self::isDefault($user_id, $news_id, ReactionConst::DISLIKE)
        ? ReactionConst::NONE
        : ReactionConst::DISLIKE;

        DB::table('reactions')->updateOrInsert(
            [
                'user_id' => $user_id,
                'news_id' => $news_id,
            ],
            ['status' => $status]
        );

        $json = $this->countReactions($news);
        return response()->json($json);
    }

    private function countReactions($news)
    {
        $newsDislikesCount = $news->getDislike()->count();
        $newsLikesCount = $news->getLike()->count();

        $json = [
            'newsDislikesCount' => $newsDislikesCount,
            'newsLikesCount' => $newsLikesCount,
        ];
        return $json;
    }
}
