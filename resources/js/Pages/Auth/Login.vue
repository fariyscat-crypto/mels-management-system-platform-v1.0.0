<template>
  <div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">
    <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
      <h1 class="text-2xl font-semibold">Sign in</h1>
      <form method="POST" action="/login" class="mt-6 space-y-4">
        <input type="hidden" name="_token" :value="csrfToken" />
        <div>
          <label class="block text-sm font-medium text-slate-700">Email</label>
          <input v-model="form.email" name="email" type="email" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700">Password</label>
          <input v-model="form.password" name="password" type="password" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
        </div>
        <button type="submit" class="w-full rounded-xl bg-slate-900 px-4 py-3 text-white">Sign in</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const form = ref({
  email: '',
  password: '',
});
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
</script>
