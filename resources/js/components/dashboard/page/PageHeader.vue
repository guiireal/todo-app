<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"]
}>();
</script>

<template>
  <header :class="cn('px-6 py-3 border-b border-border', props.class)">
    <slot/>
  </header>
</template>
