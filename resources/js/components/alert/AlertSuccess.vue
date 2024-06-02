<script setup lang="ts">
import { Alert, AlertDescription, AlertTitle } from "@/components/ui/alert";
import { RocketIcon } from "@radix-icons/vue";

defineProps({
  title: {
    type: String,
    required: false
  }
});
</script>

<template>
  <Alert class="bg-green-200 border-green-500">
    <RocketIcon class="h-4 w-4"/>
    <AlertTitle>{{ title ?? "Sucesso!" }}</AlertTitle>
    <AlertDescription>
      <slot/>
    </AlertDescription>
  </Alert>
</template>
