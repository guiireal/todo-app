<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"]
}>();
</script>

<template>
  <aside :class="cn('border-r border-border flex flex-col space-y-6', props.class)">
    <slot/>
  </aside>
</template>
