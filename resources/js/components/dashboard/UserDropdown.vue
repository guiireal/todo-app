<script setup lang="ts">
import { Avatar, AvatarFallback, } from "@/components/ui/avatar";
import { Button } from "@/components/ui/button";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { useAuthUser } from "@/composables/useAuthUser";
import { LockClosedIcon, MixerVerticalIcon, RocketIcon } from "@radix-icons/vue";
import { router } from "@inertiajs/vue3";

const user = useAuthUser();

const emailFormatted = () => {
  const size = 23;
  if (user.email.length > size) {
    return `${user.email.substring(0, size)}...`;
  }
  return user.email;
};

</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <Button variant="link" class="relative h-8 items-center justify-between w-full space-x-2 !px-0">
        <Avatar class="h-8 w-8">
          <AvatarFallback>{{ user.name[0] }}</AvatarFallback>
        </Avatar>
        <div class="flex flex-col flex-1 space-y-1 text-left">
          <p class="text-sm font-medium leading-none">
            {{ user.name }}
          </p>
          <p class="text-xs leading-none text-muted-foreground">
            {{ emailFormatted() }}
          </p>
        </div>
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent class="w-56" align="end">
      <DropdownMenuLabel class="font-normal flex">
        <div class="flex flex-col space-y-1">
          <p class="text-sm font-medium leading-none">
            {{ user.name }}
          </p>
          <p class="text-xs leading-none text-muted-foreground">
            {{ emailFormatted() }}
          </p>
        </div>
      </DropdownMenuLabel>
      <DropdownMenuSeparator/>
      <DropdownMenuGroup>
        <DropdownMenuItem @click="router.visit(route('app.settings.index'))">
          <MixerVerticalIcon class="w-3 h-3 mr-3"/>
          Configurações
        </DropdownMenuItem>
        <DropdownMenuItem @click="router.visit(route('app.settings.billing.index'))">
          <RocketIcon class="w-3 h-3 mr-3"/>
          Upgrade
        </DropdownMenuItem>
      </DropdownMenuGroup>
      <DropdownMenuSeparator/>
      <DropdownMenuItem @click="router.delete(route('app.logout'))">
        <LockClosedIcon class="w-3 h-3 mr-3"/>
        Sair
      </DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
