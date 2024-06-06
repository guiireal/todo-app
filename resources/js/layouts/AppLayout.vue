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
import { HomeIcon, MixerVerticalIcon } from "@radix-icons/vue";
import UserDropdown from "@/components/dashboard/UserDropdown.vue";
import Logo from "@/components/Logo.vue";
import Toaster from "@/components/ui/toast/Toaster.vue";
import { useIsActivePage } from "@/composables/useIsActivePage";

const isActivePage = useIsActivePage();

</script>

<template>
  <div class="grid grid-cols-[16rem_1fr]">
    <Sidebar>
      <SidebarHeader>
        <Logo/>
      </SidebarHeader>
      <SidebarMain class="flex flex-col flex-grow">
        <SidebarNav>
          <SidebarNavMain>
            <SidebarNavLink
              :href="route('app.index')"
              :active="isActivePage('app.index')">
              <HomeIcon class="w-3 h-3 mr-3"/>
              Tarefas
            </SidebarNavLink>
            <SidebarNavLink
              :href="route('app.settings.index')"
              :active="isActivePage('app.settings.index')">
              <MixerVerticalIcon class="w-3 h-3 mr-3"/>
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
        <UserDropdown/>
      </SidebarFooter>
    </Sidebar>
    <main>
      <slot/>
    </main>
    <Toaster/>
  </div>
</template>
