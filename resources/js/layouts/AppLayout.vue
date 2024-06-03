<script setup lang="ts">

import Sidebar from "../components/dashboard/sidebar/Sidebar.vue";
import {
  SidebarFooter,
  SidebarHeader,
  SidebarMain,
  SidebarNav,
  SidebarNavHeader,
  SidebarNavHeaderTitle,
  SidebarNavLink,
  SidebarNavMain
} from "@/components/dashboard/sidebar";
</script>

<template>
  <div class="grid grid-cols-[16rem_1fr] gap-4">
    <Sidebar>
      <SidebarHeader>
        <h1></h1>
      </SidebarHeader>
      <SidebarMain>
        <SidebarNav>
          <SidebarNavMain>
            <SidebarNavLink :href="route('app.index')">Tarefas</SidebarNavLink>
            <SidebarNavLink :href="route('app.settings.index')">Configurações</SidebarNavLink>
          </SidebarNavMain>
        </SidebarNav>

        <SidebarNav>
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
