<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import { Page, PageHeader, PageHeaderTitle, PageMain } from "@/components/dashboard/page";
</script>

<template>
  <AppLayout>
    <Page>
      <PageHeader>
        <PageHeaderTitle>Configurações</PageHeaderTitle>
      </PageHeader>
      <PageMain>
        <h1>Configurações</h1>
      </PageMain>
    </Page>
  </AppLayout>
</template>
