<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"]
}>();
</script>

<template>
  <main :class="cn('pt-6 px-3', props.class)">
    <slot/>
  </main>
</template>
