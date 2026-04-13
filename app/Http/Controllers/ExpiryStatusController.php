<?php

namespace App\Http\Controllers;

use App\Helpers\ExpiryStatusHelper;
use App\Helpers\ComparisonHelper;
use App\Helpers\PageHelper;
use App\Models\ExpiryStatusModel;
use Illuminate\Http\Request;

class ExpiryStatusController extends Controller
{
    public function index()
    {
        $listExpiryStatus = ExpiryStatusModel::orderBy('priority', 'asc')
            ->get() 
            ->map(function ($data) {
                $data->badge = ExpiryStatusHelper::badge($data->name);
                $data->range_display = $this->formatRange($data->min_day, $data->max_day);
                
                return $data;
            });

        $page = PageHelper::page('Expiry Status', 'expiry_status');
        
        return view('expiry_status.index', compact('page', 'listExpiryStatus'));
    }

    private function formatRange($min, $max)
    {
        if ($min <= -9999) return "Below {$max} days";
        if ($max >= 9999) return "More than {$min} days";
        return "{$min} to {$max} days";
    }

    public function edit(ExpiryStatusModel $expiry_status)
    {
        $page = PageHelper::page('Edit Expiry Status', 'expiry_status');
        return view('expiry_status.edit', compact('page', 'expiry_status'));
    }

    public function update(Request $request, $uuid)
    {
        $expiry_status = ExpiryStatusModel::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'min_day' => 'required|integer|min:-10000|max:10000',
            'max_day' => 'required|integer|min:-10000|max:10000|gte:min_day',
            'priority' => 'required|integer|min:1',
        ], [
            'max_day.gte' => 'Maximum day must be greater than or equal to Minimum day.',
        ]);

        $expiry_status->update([
            'min_day' => $request->min_day,
            'max_day' => $request->max_day,
            'priority' => $request->priority,
        ]);

        return redirect()
            ->route('expiry_status.index')
            ->with('success', "Status {$expiry_status->name} successfully updated.");
    }
}
