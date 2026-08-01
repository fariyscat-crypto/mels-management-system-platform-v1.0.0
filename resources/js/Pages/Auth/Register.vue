<template>
  <div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">
    <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
      <h1 class="text-2xl font-semibold">Create account</h1>
      <form @submit.prevent="submit" class="mt-6 space-y-4">
        <div>
          <label class="block text-sm font-medium text-slate-700">Name</label>
          <input v-model="form.name" type="text" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700">Email</label>
          <input v-model="form.email" type="email" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700">Password</label>
          <input v-model="form.password" type="password" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700">Confirm password</label>
          <input v-model="form.password_confirmation" type="password" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3" required />
        </div>
        <button type="submit" class="w-full rounded-xl bg-slate-900 px-4 py-3 text-white">Register</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  router.post('/register', form.value);
};
</script>
