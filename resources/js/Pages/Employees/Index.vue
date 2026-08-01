<template>
  <div class="min-h-screen bg-slate-50 p-8">
    <h1 class="text-2xl font-semibold">Employees</h1>
    <form method="GET" action="/employees" class="mt-4 flex gap-3">
      <input v-model="search" name="search" class="w-full rounded-xl border px-4 py-2" placeholder="Search employees..." />
      <button class="rounded-xl border px-4 py-2">Search</button>
    </form>
    <div class="mt-4 space-y-3">
      <div v-for="employee in employees.data" :key="employee.id" class="rounded-xl border bg-white p-4">
        <p class="font-medium">{{ employee.name }}</p>
        <p class="text-sm text-slate-600">{{ employee.email }}</p>
      </div>
    </div>
    <div class="mt-4 flex gap-2">
      <Link v-if="employees.prev_page_url" :href="employees.prev_page_url" class="rounded-xl border px-4 py-2">Previous</Link>
      <Link v-if="employees.next_page_url" :href="employees.next_page_url" class="rounded-xl border px-4 py-2">Next</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  employees: Object,
  filters: Object,
});

const search = ref(props.filters?.search ?? '');
</script>
