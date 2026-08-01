<template>
  <div class="min-h-screen bg-slate-50 text-slate-900">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
      <Head title="Projects" />
      <div class="flex items-center justify-between mb-6">
        <div>
          <h1 class="text-3xl font-semibold">Projects</h1>
          <p class="text-sm text-slate-500">Manage active, planned, and archived projects.</p>
        </div>
        <Link href="/projects/create" class="rounded-xl bg-slate-900 px-4 py-2 text-white">New Project</Link>
      </div>
      <form class="mb-6 flex gap-3" method="GET" action="/projects">
        <input v-model="search" name="search" type="text" class="w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="Search projects..." />
        <button type="submit" class="rounded-xl border border-slate-300 px-4 py-2 text-slate-800">Search</button>
      </form>

      <div class="space-y-4">
        <div v-for="project in projects.data" :key="project.id" class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
          <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
              <h2 class="text-xl font-semibold">{{ project.name }}</h2>
              <p class="mt-2 text-sm text-slate-600">{{ project.description }}</p>
            </div>
            <div class="flex flex-wrap gap-2 text-sm">
              <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-700">{{ project.status }}</span>
              <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-700">Owner: {{ project.owner.name }}</span>
            </div>
          </div>
          <div class="mt-4 flex flex-wrap gap-2">
            <Link :href="`/projects/${project.id}/edit`" class="rounded-xl border border-slate-200 px-4 py-2 text-slate-900">Edit</Link>
            <form :action="`/projects/${project.id}`" method="POST">
              <input type="hidden" name="_token" :value="csrfToken" />
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="rounded-xl border border-red-200 px-4 py-2 text-red-700">Delete</button>
            </form>
          </div>
        </div>
      </div>
      <div class="mt-6 flex gap-2">
        <Link v-if="projects.prev_page_url" :href="projects.prev_page_url" class="rounded-xl border border-slate-300 px-4 py-2">Previous</Link>
        <Link v-if="projects.next_page_url" :href="projects.next_page_url" class="rounded-xl border border-slate-300 px-4 py-2">Next</Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  projects: Object,
  filters: Object,
});

const search = ref(props.filters?.search ?? '');
const csrfToken = usePage().props.csrf_token;
</script>
