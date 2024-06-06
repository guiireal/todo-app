<script setup lang="ts">
import { Page, PageHeader, PageHeaderTitle, PageMain } from "@/components/dashboard/page";
import SettingsSidebar from "@/components/dashboard/settings/SettingsSidebar.vue";
import AppLayout from "@/layouts/AppLayout.vue";
</script>

<template>
  <AppLayout>
    <Page>
      <PageHeader>
        <PageHeaderTitle>Configurações</PageHeaderTitle>
      </PageHeader>
      <PageMain>
        <div class="container max-w-screen-lg">
          <div class="grid grid-cols-[16rem_1fr] gap-x-10">
            <SettingsSidebar/>
            <slot/>
          </div>
        </div>
      </PageMain>
    </Page>
  </AppLayout>
</template>
