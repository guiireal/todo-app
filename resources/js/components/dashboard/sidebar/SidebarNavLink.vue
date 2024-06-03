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
  <Link :class="cn('', props.class)" :href="href">
    <slot/>
  </Link>
</template>
