<?php

namespace App\Repositories;

use App\Repositories\Interfaces\VisitorRepositoryInterface;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorRepository implements VisitorRepositoryInterface
{

    public function allVisitor()
    {
        return Visitor::latest()->paginate(10);
    }

    public function storeVisitor($data)
    {
        return Visitor::create($data);
    }

    public function findVisitor($id)
    {
        return Visitor::find($id);
    }

    public function findVisitorIP($ip)
    {
        $visitor = Visitor::where('ip_address', $ip)->first();
        return $visitor;
    }

    public function updateVisitor($data)
    {
        $visitor = Visitor::where('ip_address', $data['ip_address'])->first();
        $visitor->visit_time = $data['visit_time'];
        $visitor->save();
    }

    public function destroyVisitor($id)
    {
        $visitor = Visitor::find($id);
        $visitor->delete();
    }

    public function weeklyVisitor($weeksAgo = 0)
    {
        $weeklyVisitorCount = Visitor::whereBetween('visitors.updated_at', [Carbon::now()->subWeeks($weeksAgo)->startOfWeek(), Carbon::now()->subWeeks($weeksAgo)->endOfWeek()])
        ->count();

        return $weeklyVisitorCount;
    }

    public function weeklyVisitorPercentageChange()
    {
        // Get the current week's visitor count
        $currentWeekCount = $this->weeklyVisitor();

        // Get the previous week's visitor count
        $previousWeekCount = $this->weeklyVisitor(1);

        // Calculate the percentage change in visitor count
        $percentageChange = 0;
        if ($previousWeekCount > 0) {
            $percentageChange = (($currentWeekCount - $previousWeekCount) / $previousWeekCount) * 100;
        }

        return round($percentageChange, 2);
    }
}