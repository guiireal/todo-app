<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"]
}>();
</script>

<template>
  <footer :class="cn('p-6 mt-auto border-t border-border', props.class)">
    <slot/>
  </footer>
</template>
