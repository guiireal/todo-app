<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/lib/utils";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{
  class?: HTMLAttributes["class"],
  href: string,
  active?: boolean,
}>();
</script>

<template>
  <Link
    :class="cn('flex items-center text-sm px-3 py-2 rounded-md', props.active && 'bg-secondary', props.class)"
    :href="href"
  >
    <slot/>
  </Link>
</template>
