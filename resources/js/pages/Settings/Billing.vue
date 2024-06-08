<script setup lang="ts">
import SettingsLayout from "@/layouts/SettingsLayout.vue";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { ref } from "vue";
import { Button } from "@/components/ui/button";
import { RocketIcon } from "@radix-icons/vue";
import { Progress } from "@/components/ui/progress";
import { router } from "@inertiajs/vue3";

const currentPlan = ref("gratuíto");

const handleUpgradePlan = () => {
  router.visit(route("app.checkout", { preserveState: true }));
};

</script>

<template>
  <SettingsLayout>
    <Card>
      <CardHeader class="border-b border-border">
        <CardTitle>Assinatura</CardTitle>
        <CardDescription>
          Você atualmente está usando o plano {{ currentPlan }}.
        </CardDescription>
      </CardHeader>
      <CardContent class="pt-6">
        <div class="space-y-2">
          <header class="flex items-center justify-between">
            <span class="text-muted-foreground text-sm">1/5</span>
            <span class="text-muted-foreground text-sm">20%</span>
          </header>
          <main>
            <Progress :model-value="20"/>
          </main>
        </div>
      </CardContent>
      <CardFooter class="flex items-center justify-between border-t border-border pt-6">
        <span>Para um maior limite, assine o plano PRO</span>
        <a :href="route('app.checkout')">
          <Button @click="handleUpgradePlan">
            <RocketIcon class="w-5 h-5 mr-3"/>
            Assine por R$ 9,90/mês
          </Button>
        </a>
      </CardFooter>
    </Card>
  </SettingsLayout>
</template>
