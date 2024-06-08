<script setup lang="ts">
import SettingsLayout from "@/layouts/SettingsLayout.vue";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { ref } from "vue";
import { Button } from "@/components/ui/button";

const currentPlan = ref("gratuíto");
</script>

<template>
  <SettingsLayout>
    <Card>
      <CardHeader>
        <CardTitle>Assinatura</CardTitle>
        <CardDescription>
          Você atualmente está usando o plano {{ currentPlan }}.
        </CardDescription>
      </CardHeader>
      <CardContent>
        Teste
      </CardContent>
      <CardFooter class="flex flex-col items-start gap-y-3">
        <span>Para um maior limite, assine o plano PRO</span>
        <Button>Assinar o plano PRO</Button>
      </CardFooter>
    </Card>
  </SettingsLayout>
</template>
