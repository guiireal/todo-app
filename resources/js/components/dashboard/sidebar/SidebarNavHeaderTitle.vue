<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";

const props = defineProps<{
  class?: HTMLAttributes["class"]
}>();
</script>

<template>
  <div :class="cn('text-xs uppercase text-muted-foreground ml-3', props.class)">
    <slot/>
  </div>
</template>
