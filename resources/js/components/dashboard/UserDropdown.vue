<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage, } from "@/components/ui/avatar";
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

const user = useAuthUser();
</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <Button variant="link" class="relative h-8 items-center justify-between w-full space-x-2 !px-0">
        <Avatar class="h-8 w-8">
          <AvatarImage src="/avatars/01.png" alt="@shadcn"/>
          <AvatarFallback>SC</AvatarFallback>
        </Avatar>
        <div class="flex flex-col flex-1 space-y-1 text-left">
          <p class="text-sm font-medium leading-none">
            shadcn
          </p>
          <p class="text-xs leading-none text-muted-foreground">
            m@example.com
          </p>
        </div>
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent class="w-56" align="end">
      <DropdownMenuLabel class="font-normal flex">
        <div class="flex flex-col space-y-1">
          <p class="text-sm font-medium leading-none">
            shadcn
          </p>
          <p class="text-xs leading-none text-muted-foreground">
            m@example.com
          </p>
        </div>
      </DropdownMenuLabel>
      <DropdownMenuSeparator/>
      <DropdownMenuGroup>
        <DropdownMenuItem>
          <MixerVerticalIcon class="w-3 h-3 mr-3"/>
          Configurações
        </DropdownMenuItem>
        <DropdownMenuItem>
          <RocketIcon class="w-3 h-3 mr-3"/>
          Upgrade
        </DropdownMenuItem>
      </DropdownMenuGroup>
      <DropdownMenuSeparator/>
      <DropdownMenuItem>
        <LockClosedIcon class="w-3 h-3 mr-3"/>
        Sair
      </DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
