<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Page, PageHeader, PageHeaderTitle, PageMain } from "@/components/dashboard/page";
import TodoDataTable from "@/components/dashboard/TodoDataTable.vue";
</script>

<template>
  <AppLayout>
    <Page>
      <PageHeader>
        <PageHeaderTitle>Tarefas</PageHeaderTitle>
      </PageHeader>
      <PageMain>
        <TodoDataTable/>
      </PageMain>
    </Page>
  </AppLayout>
</template>

