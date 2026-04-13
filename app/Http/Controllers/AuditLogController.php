<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Helpers\RoleHelper;
use App\Models\AuditLogModel;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAuditLog = AuditLogModel::with('user')
                        ->get()
                        ->map(function($data) {
                            $roleName = $data->user->roles->first()->name;
                            $data->role = RoleHelper::badge($roleName);
                            return $data;
                        });

        $page = PageHelper::page('Audit Logs', 'audit_log');
        return view('audit_log.index', compact('page', 'listAuditLog'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AuditLogModel $audit)
    {
        $page = PageHelper::page('Show Audit Logs', 'audit_log');
        return view('audit_log.show', compact('page', 'audit'));
    }
}
