<template>
  <div class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="grid gap-6 lg:grid-cols-[1fr_300px]">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm dark:border-slate-800 dark:bg-slate-900">
          <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
            <div class="mels-icon-wrap mels-icon-float mels-icon-glow" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" class="mels-icon h-7 w-7 text-blue-600 dark:text-blue-400">
                <path d="M3 3v18h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7 14l3-3 3 2 4-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M17 8h1.5V9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <div>
              <h1 class="text-3xl font-semibold tracking-tight">MELS Platform</h1>
              <p class="mt-1 text-sm font-medium text-slate-600 dark:text-slate-300">Smart Monitoring • Evaluation • Learning System</p>
            </div>
          </div>
          <p class="mt-5 text-slate-600 dark:text-slate-300">Welcome to the tenant-ready Monitoring, Evaluation, Learning and Sustainability platform.</p>
          <div class="mt-8 grid gap-4 sm:grid-cols-2">
            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-800">
              <p class="text-sm text-slate-500 dark:text-slate-300">Projects</p>
              <p class="mt-2 text-2xl font-semibold">{{ projectsCount }}</p>
            </div>
            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-800">
              <p class="text-sm text-slate-500 dark:text-slate-300">Users</p>
              <p class="mt-2 text-2xl font-semibold">{{ usersCount }}</p>
            </div>
          </div>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm dark:border-slate-800 dark:bg-slate-900">
          <h2 class="text-xl font-semibold">Quick Actions</h2>
          <div class="mt-5 space-y-3">
            <Link href="/projects" class="block rounded-xl bg-slate-900 px-4 py-3 text-center text-white">View Projects</Link>
            <Link href="/projects/create" class="block rounded-xl border border-slate-200 px-4 py-3 text-center text-slate-900 dark:border-slate-700 dark:text-slate-100">Create Project</Link>
            <Link href="/employees" class="block rounded-xl border border-slate-200 px-4 py-3 text-center text-slate-900 dark:border-slate-700 dark:text-slate-100">Employees</Link>
            <Link href="/clients" class="block rounded-xl border border-slate-200 px-4 py-3 text-center text-slate-900 dark:border-slate-700 dark:text-slate-100">Clients</Link>
            <Link href="/tasks" class="block rounded-xl border border-slate-200 px-4 py-3 text-center text-slate-900 dark:border-slate-700 dark:text-slate-100">Tasks</Link>
            <Link href="/roles-permissions" class="block rounded-xl border border-slate-200 px-4 py-3 text-center text-slate-900 dark:border-slate-700 dark:text-slate-100">Roles & Permissions</Link>
            <Link href="/users" class="block rounded-xl border border-slate-200 px-4 py-3 text-center text-slate-900 dark:border-slate-700 dark:text-slate-100">User Management</Link>
            <form method="POST" action="/logout">
              <input type="hidden" name="_token" :value="csrfToken" />
              <button type="submit" class="block w-full rounded-xl border border-red-200 px-4 py-3 text-center text-red-700">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
  projectsCount: Number,
  usersCount: Number,
});

const csrfToken = usePage().props.csrf_token;
</script>
