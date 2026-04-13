<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationModel;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $listNotification = NotificationModel::with('user')->orderByDesc('id')->where('is_read', false)->where('user_id', Auth::id())->lazy();

        $page = PageHelper::page('Notification', 'notification');
        return view('notification.index', compact('page', 'listNotification'));
    }

    public function markAsRead($uuid)
    {
        $notification = NotificationModel::where('uuid', $uuid)->firstOrFail();
        $notification->update(['is_read' => true]);

        return redirect()->route('notification.index')->with('success', 'Notification marked as read.');
    }
}
