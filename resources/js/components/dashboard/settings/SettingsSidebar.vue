<script setup lang="ts">
import { SidebarNav, SidebarNavLink, SidebarNavMain } from "@/components/dashboard/sidebar";
import { useIsActivePage } from "@/composables/useIsActivePage";

const { isActivePage } = useIsActivePage();
</script>

<template>
  <SidebarNav>
    <SidebarNavMain>
      <SidebarNavLink
        :href="route('app.settings.index')"
        :active="isActivePage('app.settings.index')"
      >
        Meu perfil
      </SidebarNavLink>
      <SidebarNavLink
        :href="route('app.settings.theme.index')"
        :active="isActivePage('app.settings.theme.index')"
      >
        Aparência
      </SidebarNavLink>
      <SidebarNavLink
        :href="route('app.settings.billing.index')"
        :active="isActivePage('app.settings.billing.index')"
      >
        Pagamento
      </SidebarNavLink>
    </SidebarNavMain>
  </SidebarNav>
</template>
