<script setup lang="ts">
import {
  Sidebar,
  SidebarFooter,
  SidebarHeader,
  SidebarMain,
  SidebarNav,
  SidebarNavHeader,
  SidebarNavHeaderTitle,
  SidebarNavLink,
  SidebarNavMain
} from "@/components/dashboard/sidebar";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const isActive = (fullUrl: string) => route(fullUrl).endsWith(page.url);

</script>

<template>
  <div class="grid grid-cols-[16rem_1fr] gap-4">
    <Sidebar>
      <SidebarHeader>
        <h1></h1>
      </SidebarHeader>
      <SidebarMain class="flex flex-col flex-grow">
        <SidebarNav>
          <SidebarNavMain>
            <SidebarNavLink
              :href="route('app.index')"
              :active="isActive('app.index')">
              Tarefas
            </SidebarNavLink>
            <SidebarNavLink
              :href="route('app.settings.index')"
              :active="isActive('app.settings.index')">
              Configurações
            </SidebarNavLink>
          </SidebarNavMain>
        </SidebarNav>

        <SidebarNav class="mt-auto">
          <SidebarNavHeader>
            <SidebarNavHeaderTitle>
              Links extras
            </SidebarNavHeaderTitle>
          </SidebarNavHeader>
          <SidebarNavMain>
            <SidebarNavLink :href="route('app.index')">Precisa de ajuda?</SidebarNavLink>
            <SidebarNavLink :href="route('app.index')">Site</SidebarNavLink>
          </SidebarNavMain>
        </SidebarNav>
      </SidebarMain>
      <SidebarFooter>
        <h1>User</h1>
      </SidebarFooter>
    </Sidebar>
    <main>
      <slot/>
    </main>
  </div>
</template>
