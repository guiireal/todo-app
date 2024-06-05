<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Page, PageHeader, PageHeaderNav, PageHeaderTitle, PageMain } from "@/components/dashboard/page";
import TodoDataTable from "@/components/dashboard/todo/TodoDataTable.vue";
import TodoUpsertForm from "@/components/dashboard/todo/TodoUpsertForm.vue";
import { Button } from "@/components/ui/button";
import { PlusIcon } from "@radix-icons/vue";
import { Todo } from "@/types";

const props = defineProps({
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
          <TodoUpsertForm>
            <Button>
              <PlusIcon class="w-4 h-4 mr-3"/>
              Adicionar tarefa
            </Button>
          </TodoUpsertForm>
        </PageHeaderNav>
      </PageHeader>
      <PageMain>
        <TodoDataTable :todos="props.todos"/>
      </PageMain>
    </Page>
  </AppLayout>
</template>

