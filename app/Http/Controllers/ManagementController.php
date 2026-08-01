<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ManagementController extends Controller
{
    public function employees(Request $request): Response
    {
        $employees = User::query()
            ->when($request->string('search')->toString(), function (Builder $query, string $search) {
                $query->where(function (Builder $nested) use ($search) {
                    $nested->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Employees/Index', [
            'employees' => $employees,
            'filters' => ['search' => $request->string('search')->toString()],
        ]);
    }

    public function clients(Request $request): Response
    {
        $clients = Project::query()
            ->with('owner')
            ->when($request->string('search')->toString(), function (Builder $query, string $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Clients/Index', [
            'clients' => $clients,
            'filters' => ['search' => $request->string('search')->toString()],
        ]);
    }

    public function tasks(Request $request): Response
    {
        $tasks = AuditLog::query()
            ->with('user')
            ->when($request->string('search')->toString(), function (Builder $query, string $search) {
                $query->where('event', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks,
            'filters' => ['search' => $request->string('search')->toString()],
        ]);
    }

    public function rolesPermissions(): Response
    {
        return Inertia::render('RolesPermissions/Index', [
            'roles' => Role::with('permissions')->get(),
        ]);
    }

    public function users(Request $request): Response
    {
        $users = User::query()
            ->when($request->string('search')->toString(), function (Builder $query, string $search) {
                $query->where(function (Builder $nested) use ($search) {
                    $nested->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => ['search' => $request->string('search')->toString()],
        ]);
    }
}
