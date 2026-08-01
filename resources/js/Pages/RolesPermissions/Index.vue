<template>
  <div class="min-h-screen bg-slate-50 p-8">
    <h1 class="text-2xl font-semibold">Roles & Permissions</h1>
    <div class="mt-4 space-y-3">
      <div v-for="role in roles" :key="role.id" class="rounded-xl border bg-white p-4">
        <p class="font-medium">{{ role.name }}</p>
        <p class="text-sm text-slate-600">Permissions: {{ role.permissions.length }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  roles: Array,
});
</script>
