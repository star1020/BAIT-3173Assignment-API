<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ReviewRepositoryInterface;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ReviewRepository implements ReviewRepositoryInterface
{

    public function allReview()
    {
        return Comment::where('comments.deleted', 0)
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->select('comments.*', 'users.name as user_name', 'users.email as user_email', 'users.image as user_image')
                    ->orderByDesc('comments.created_at')
                    ->get();
    }

    public function weeklyReview($weeksAgo = 0)
    {
        $weeklyReviewCount = Comment::where('comments.deleted', 0)
        ->whereBetween('comments.created_at', [Carbon::now()->subWeeks($weeksAgo)->startOfWeek(), Carbon::now()->subWeeks($weeksAgo)->endOfWeek()])
        ->count();

        return $weeklyReviewCount;
    }

    public function weeklyReviewPercentageChange()
    {
        // Get the current week's review count
        $currentWeekCount = $this->weeklyReview();

        // Get the previous week's review count
        $previousWeekCount = $this->weeklyReview(1);

        // Calculate the percentage change in review count
        $percentageChange = 0;
        if ($previousWeekCount > 0) {
            $percentageChange = (($currentWeekCount - $previousWeekCount) / $previousWeekCount) * 100;
        }

        return round($percentageChange, 2);
    }

    public function storeReview($data)
    {
        return Comment::create($data);
    }

    public function findReview($id)
    {
        return Comment::join('users', 'users.id', '=', 'comments.user_id')
                    ->select('comments.*', 'users.name as user_name', 'users.email as user_email')
                    ->where('comments.id', $id)
                    ->first();
    }

    public function updateReview($data, $id)
    {
        $review = Comment::where('id', $id)->first();
        $review->comment = $data['comment'];
        $review->save();
    }

    public function updateLikes($data, $id)
    {
        $review = Comment::where('id', $id)->first();
        $review->likes = $data;
        $review->save();
    }

    public function destroyReview($id)
    {
        $review = Comment::find($id);
        $review->deleted = 1;
        $review->save();
    }
}
