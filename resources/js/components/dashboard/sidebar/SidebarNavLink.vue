<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
  class?: HTMLAttributes["class"],
  href: string
}>();
</script>

<template>
  <Link :class="cn('text-sm px-3 py-2', props.class)" :href="href">
    <slot/>
  </Link>
</template>
