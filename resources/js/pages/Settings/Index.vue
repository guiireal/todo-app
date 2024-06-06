<script setup lang="ts">
import SettingsLayout from "@/layouts/SettingsLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "@/components/ui/toast/use-toast";
import { useAuthUser } from "@/composables/useAuthUser";
import { Button } from "@/components/ui/button";
import { Label } from "@/components/ui/label";
import { Input } from "@/components/ui/input";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";

const { toast } = useToast();

const user = useAuthUser();

const form = useForm({
  name: user.name,
});

const submit = () => {
  form.put(route("app.settings.update"),
    {
      preserveScroll: true,
      preserveState: true,
      onSuccess: () => {
        toast({
          title: "Sucesso!",
          description: "Perfil atualizado com sucesso!",
        });
      },
    }
  );
};
</script>

<template>
  <SettingsLayout>
    <form @submit.prevent="submit">
      <Card class="mb-6">
        <CardHeader>
          <CardTitle>Nome</CardTitle>
          <CardDescription>Seu nome será exibido publicamente.</CardDescription>
        </CardHeader>
        <CardContent>
          <div class="grid gap-4">
            <div>
              <Label for="name" class="mb-2">
                Nome
              </Label>
              <Input
                id="name"
                v-model="form.name"
                class="col-span-3"
                placeholder="Nome"
                minlength="2"
                maxlength="50"
              />
            </div>
          </div>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>E-mail</CardTitle>
          <CardDescription> Para alterar seu e-mail, entre em contato com o suporte.</CardDescription>
        </CardHeader>
        <CardContent>
          <div class="grid gap-4">
            <div>
              <Label for="name" class="mb-2">
                E-mail
              </Label>
              <Input
                id="email"
                v-model="user.email"
                disabled
                class="col-span-3"
                placeholder="E-mail"
              />
            </div>
          </div>
        </CardContent>
      </Card>

      <Button type="submit" class="mt-6" :disabled="form.processing">
        <span v-if="form.processing">Atualizando...</span>
        <span v-if="!form.processing">Atualizar</span>
      </Button>
    </form>
  </SettingsLayout>
</template>
