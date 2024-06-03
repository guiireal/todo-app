<script setup lang="ts">
import { Label } from "@/components/ui/label";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";

import { useForm } from "@inertiajs/vue3";

import AlertSuccess from "@/components/alert/AlertSuccess.vue";

const form = useForm({
  email: ""
});

defineProps({
  message: {
    type: String,
    required: false
  }
});

const submit = () => {
  form.post(route("login.store"), {
    onSuccess: () => form.reset("email"),
  });
};

</script>

<template>
  <div class="flex min-h-[100dvh] items-center justify-center bg-gray-100 px-4 dark:bg-gray-950">
    <div class="w-full max-w-md space-y-6">
      <div class="space-y-2 text-center">
        <h1 class="text-3xl font-bold">Login</h1>
        <p class="text-gray-500 dark:text-gray-400">Digite seu e-mail para entrar ou criar uma conta.</p>
      </div>
      <form class="space-y-4" @submit.prevent="submit">
        <div>
          <Label for="email">E-mail</Label>
          <Input
            id="email"
            type="email"
            placeholder="Digite seu melhor e-mail"
            required class="bg-white"
            v-model="form.email"
          />
          <div class="text-red-500" v-if="form.errors.email">{{ form.errors.email }}</div>
        </div>
        <Button type="submit" class="w-full" :disabled="form.processing">
          <span v-if="!form.processing">Enviar link de acesso por e-mail</span>
          <span v-if="form.processing">Enviando...</span>
        </Button>
        <AlertSuccess v-if="form.wasSuccessful">
          {{ message }}
        </AlertSuccess>
      </form>
    </div>
  </div>
</template>


