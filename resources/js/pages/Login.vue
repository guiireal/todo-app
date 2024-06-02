<script setup lang="ts">
import { Label } from "@/components/ui/label";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
</script>

<template>
  <div class="flex min-h-[100dvh] items-center justify-center bg-gray-100 px-4 dark:bg-gray-950">
    <div class="w-full max-w-md space-y-6">
      <div class="space-y-2 text-center">
        <h1 class="text-3xl font-bold">Login</h1>
        <p class="text-gray-500 dark:text-gray-400">Digite seu e-mail para entrar ou criar uma conta.</p>
      </div>
      <form class="space-y-4">
        <div>
          <Label htmlFor="email">E-mail</Label>
          <Input id="email" type="email" placeholder="Digite seu melhor e-mail" required/>
        </div>
        <Button type="submit" class="w-full">
          Enviar link de acesso por e-mail
        </Button>
      </form>
    </div>
  </div>
</template>


