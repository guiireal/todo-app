<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"]
}>();
</script>

<template>
  <main :class="cn('p-6', props.class)">
    <slot/>
  </main>
</template>
