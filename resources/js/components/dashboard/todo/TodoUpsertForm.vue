<script setup lang="ts">
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetFooter,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/components/ui/sheet";
import { useForm } from "@inertiajs/vue3";
import { useToast } from "@/components/ui/toast/use-toast";
import { Todo } from "@/types";

const { toast } = useToast();

const props = defineProps<{
  todo?: Todo;
}>();

const form = useForm({
  title: props.todo?.title || "",
});


const submit = () => {
  const hasTodo = !!props.todo;
  form.post(route("app.todos.store"),
    {
      preserveState: true,
      onSuccess: () => {
        toast({
          title: "Sucesso!",
          description: `Tarefa ${hasTodo ? "atualizada" : "criada"} com sucesso!`,
        });

        form.reset("title");
      },
    }
  );
};

</script>

<template>
  <Sheet>
    <SheetTrigger as-child>
      <div ref="divRef">
        <slot/>
      </div>
    </SheetTrigger>
    <SheetContent>
      <SheetHeader>
        <SheetTitle>{{ props.todo ? "Editar tarefa" : "Criar tarefa" }}</SheetTitle>
      </SheetHeader>
      <form @submit.prevent="submit">
        <div class="grid gap-4 py-4">
          <div>
            <Label for="name" class="mb-2">
              Título
            </Label>
            <Input
              id="title"
              v-model="form.title"
              class="col-span-3"
              placeholder="Título da tarefa"
            />
          </div>
        </div>
        <SheetFooter>
          <SheetClose as-child>
            <Button type="submit">
              Salvar
            </Button>
          </SheetClose>
        </SheetFooter>
      </form>
    </SheetContent>
  </Sheet>
</template>
