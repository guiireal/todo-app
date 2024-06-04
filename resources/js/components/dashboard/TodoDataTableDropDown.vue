<script setup lang="ts">
import { MoreHorizontal } from "lucide-vue-next";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger
} from "@/components/ui/dropdown-menu";
import { Button } from "@/components/ui/button";

defineProps<{
  todo: {
    id: string
  }
}>();

function copy(id: string) {
  navigator.clipboard.writeText(id);
}
</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <Button variant="ghost" class="w-8 h-8 p-0">
        <span class="sr-only">Abrir menu</span>
        <MoreHorizontal class="w-4 h-4"/>
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent align="end">
      <DropdownMenuLabel>Ações</DropdownMenuLabel>
      <DropdownMenuItem @click="copy(todo.id)">
        Copiar ID
      </DropdownMenuItem>
      <DropdownMenuSeparator/>
      <DropdownMenuItem>Marcar como concluída</DropdownMenuItem>
      <DropdownMenuItem>Excluir</DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
