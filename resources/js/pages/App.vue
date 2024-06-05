<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Page, PageHeader, PageHeaderNav, PageHeaderTitle, PageMain } from "@/components/dashboard/page";
import TodoDataTable from "@/components/dashboard/todo/TodoDataTable.vue";
import TodoCreateForm from "@/components/dashboard/todo/TodoCreateForm.vue";
import { Button } from "@/components/ui/button";
import { PlusIcon } from "@radix-icons/vue";
import { Todo } from "@/types";

defineProps({
  todos: {
    type: Array<Todo>,
    required: true
  }
});

</script>

<template>
  <AppLayout>
    <Page>
      <PageHeader>
        <PageHeaderTitle>Tarefas</PageHeaderTitle>
        <PageHeaderNav>
          <TodoCreateForm>
            <Button>
              <PlusIcon class="w-4 h-4 mr-3"/>
              Adicionar tarefa
            </Button>
          </TodoCreateForm>
        </PageHeaderNav>
      </PageHeader>
      <PageMain>
        <TodoDataTable :todos="todos"/>
      </PageMain>
    </Page>
  </AppLayout>
</template>

