<template>
  <div class="min-h-screen bg-slate-50 text-slate-900">
    <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
        <h1 class="text-2xl font-semibold">Create Project</h1>
        <form method="POST" action="/projects" class="mt-6 space-y-4">
          <input type="hidden" name="_token" :value="csrfToken" />
          <div>
            <label class="block text-sm font-medium text-slate-700">Name</label>
            <input v-model="form.name" name="name" type="text" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Description</label>
            <textarea v-model="form.description" name="description" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" rows="4"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Status</label>
            <select v-model="form.status" name="status" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3">
              <option value="planned">Planned</option>
              <option value="active">Active</option>
              <option value="completed">Completed</option>
              <option value="archived">Archived</option>
            </select>
          </div>
          <div class="grid gap-4 md:grid-cols-2">
            <div>
              <label class="block text-sm font-medium text-slate-700">Start Date</label>
              <input v-model="form.start_date" name="start_date" type="date" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">End Date</label>
              <input v-model="form.end_date" name="end_date" type="date" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" />
            </div>
          </div>
          <div class="flex items-center gap-3">
            <button type="submit" class="rounded-xl bg-slate-900 px-5 py-3 text-white">Save project</button>
            <Link href="/projects" class="text-slate-700">Cancel</Link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const form = reactive({
  name: '',
  description: '',
  status: 'planned',
  start_date: '',
  end_date: '',
});

const csrfToken = usePage().props.csrf_token;
</script>
