<template>
  <div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">
    <div class="w-full max-w-md rounded-3xl border border-slate-200 bg-white p-8 shadow-sm text-center">
      <h1 class="text-2xl font-semibold">Verify your email</h1>
      <p class="mt-4 text-slate-600">Please check your inbox for a verification link before continuing.</p>
      <div class="mt-6 space-y-3">
        <button @click="send" class="w-full rounded-xl bg-slate-900 px-4 py-3 text-white">Resend verification email</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const send = () => {
  router.post('/email/verification-notification');
};
</script>
