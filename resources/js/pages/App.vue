<script setup lang="ts">
import { useAuthUser } from "@/composables/useAuthUser";
import { Avatar, AvatarFallback } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import { router } from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";

const user = useAuthUser();

const logout = () => {
  router.delete(route("app.logout"));
};
</script>

<template>
  <AppLayout>
    <main class="flex items-center justify-center h-screen">
      <div class="flex flex-col items-center justify-center space-y-4">
        <Avatar>
          <AvatarFallback>{{ user.email[0].toLocaleUpperCase() }}</AvatarFallback>
        </Avatar>
        <span>{{ user.email }}</span>
        <Button variant="outline" @click="logout">Sair</Button>
      </div>
    </main>
  </AppLayout>
</template>

