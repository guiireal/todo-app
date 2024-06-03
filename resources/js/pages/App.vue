<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Page, PageHeader, PageHeaderTitle, PageMain } from "@/components/dashboard/page";
</script>

<template>
  <AppLayout>
    <Page>
      <PageHeader>
        <PageHeaderTitle>Tarefas</PageHeaderTitle>
      </PageHeader>
      <PageMain>
        <h1>Tarefas</h1>
      </PageMain>
    </Page>
  </AppLayout>
</template>

