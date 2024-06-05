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
import { useToast } from "@/components/ui/toast/use-toast";
import { router } from "@inertiajs/vue3";

const { toast } = useToast();

defineProps<{
  todo: {
    id: string
  }
}>();

const copy = (id: string) => navigator.clipboard.writeText(id);

const markAsCompleted = async (id: string) => {
  try {
    router.put(route("app.todos.mark-as-completed", { todo: id }));

    toast({
      title: "Sucesso!",
      description: `Tarefa marcada como concluída!`,
    });

    setTimeout(() => {
      location.reload();
    }, 1000);
  } catch (error) {
    toast({
      title: "Erro!",
      description: `Ocorreu um erro ao marcar a tarefa como concluída!`,
    });
  }
};

const deleteTodo = async (id: string) => {
  try {
    router.delete(route("app.todos.destroy", { todo: id }));
    toast({
      title: "Sucesso!",
      description: `Tarefa excluída!`,
    });

    setTimeout(() => {
      location.reload();
    }, 1000);
  } catch (error) {
    toast({
      title: "Erro!",
      description: `Ocorreu um erro ao excluir a tarefa!`,
    });
  }
};

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
      <DropdownMenuItem @click="markAsCompleted(todo.id)">Marcar como concluída</DropdownMenuItem>
      <DropdownMenuItem @click="deleteTodo(todo.id)">Excluir</DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
