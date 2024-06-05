<script setup lang="ts">
import type { ColumnDef, ColumnFiltersState, SortingState, VisibilityState, } from "@tanstack/vue-table";
import {
  FlexRender,
  getCoreRowModel,
  getFilteredRowModel,
  getPaginationRowModel,
  getSortedRowModel,
  useVueTable,
} from "@tanstack/vue-table";
import { h, ref } from "vue";
import { CaretSortIcon, ChevronDownIcon } from "@radix-icons/vue";
import DropdownAction from "./TodoDataTableDropDown.vue";
import { Button } from "@/components/ui/button";
import {
  DropdownMenu,
  DropdownMenuCheckboxItem,
  DropdownMenuContent,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { Input } from "@/components/ui/input";
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, } from "@/components/ui/table";
import { valueUpdater } from "@/lib/utils";
import { Badge } from "@/components/ui/badge";
import { Todo } from "@/types";

const props = defineProps({
  todos: {
    type: Array<Todo>,
    required: true
  }
});

const dataTableData = ref<Todo[]>(props.todos);

const columns: ColumnDef<Todo>[] = [
  {
    accessorKey: "is_completed",
    header: () => h("div", { class: "text-gray-400" }, "Concluído?"),
    cell: ({ row }: any) => {
      const isCompleted = row.getValue("is_completed") ? "Sim" : "Não";

      return h(Badge, {
        class: isCompleted === "Sim"
          ? "bg-green-100 text-green-800"
          : "bg-red-100 text-red-800",
        variant: "outline"
      }, isCompleted);
    }
  },
  {
    accessorKey: "title",
    header: ({ column }: any) => {
      return h(Button, {
          variant: "ghost",
          class: "text-md",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
        },
        ["Título", h(CaretSortIcon, { class: "ml-2 h-4 w-4" })]);
    },
    cell: ({ row }: any) => h("div", {}, row.getValue("title")),
  },
  {
    accessorKey: "created_at",
    header: () => h("div", { class: "text-right text-gray-400" }, "Criado em"),
    cell: ({ row }: any) => h("div", { class: "text-right font-medium" }, new Date(row.getValue("created_at")).toLocaleDateString()),
  },
  {
    id: "actions",
    enableHiding: false,
    cell: ({ row }: any) => h(DropdownAction, { todo: row.original })
  },
];

const mapIds = [{
  id: "is_completed",
  label: "Concluído?",
}, {
  id: "title",
  label: "Título",
}, {
  id: "created_at",
  label: "Criado em",
}];

const sorting = ref<SortingState>([]);
const columnFilters = ref<ColumnFiltersState>([]);
const columnVisibility = ref<VisibilityState>({});
const rowSelection = ref({});

const table = useVueTable({
  data: dataTableData.value,
  columns,
  getCoreRowModel: getCoreRowModel(),
  getPaginationRowModel: getPaginationRowModel(),
  getSortedRowModel: getSortedRowModel(),
  getFilteredRowModel: getFilteredRowModel(),
  onSortingChange: (updaterOrValue: any) => valueUpdater(updaterOrValue, sorting),
  onColumnFiltersChange: (updaterOrValue: any) => valueUpdater(updaterOrValue, columnFilters),
  onColumnVisibilityChange: (updaterOrValue: any) => valueUpdater(updaterOrValue, columnVisibility),
  onRowSelectionChange: (updaterOrValue: any) => valueUpdater(updaterOrValue, rowSelection),
  state: {
    get sorting() {
      return sorting.value;
    },
    get columnFilters() {
      return columnFilters.value;
    },
    get columnVisibility() {
      return columnVisibility.value;
    },
    get rowSelection() {
      return rowSelection.value;
    },
  },
});

</script>

<template>
  <div class="w-full">
    <div class="flex items-center py-4">
      <Input
        class="max-w-sm"
        placeholder="Filtrar tarefas..."
        :model-value="table.getColumn('title')?.getFilterValue() as string"
        @update:model-value="table.getColumn('title')?.setFilterValue($event)"
      />
      <DropdownMenu>
        <DropdownMenuTrigger as-child>
          <Button variant="outline" class="ml-auto">
            Colunas
            <ChevronDownIcon class="ml-2 h-4 w-4"/>
          </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end">
          <DropdownMenuCheckboxItem
            v-for="column in table.getAllColumns().filter((column: any) => column.getCanHide())"
            :key="column.id"
            class="capitalize"
            :checked="column.getIsVisible()"
            @update:checked="(value) => {
              column.toggleVisibility(!!value)
            }"
          >
            {{ mapIds.find(({ id }) => id === column.id)?.label }}
          </DropdownMenuCheckboxItem>
        </DropdownMenuContent>
      </DropdownMenu>
    </div>
    <div class="rounded-md border">
      <Table>
        <TableHeader>
          <TableRow v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
            <TableHead v-for="header in headerGroup.headers" :key="header.id">
              <FlexRender v-if="!header.isPlaceholder" :render="header.column.columnDef.header"
                          :props="header.getContext()"/>
            </TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          <template v-if="table.getRowModel().rows?.length">
            <TableRow
              v-for="row in table.getRowModel().rows"
              :key="row.id"
              :data-state="row.getIsSelected() && 'selected'"
            >
              <TableCell v-for="cell in row.getVisibleCells()" :key="cell.id">
                <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()"/>
              </TableCell>
            </TableRow>
          </template>

          <TableRow v-else>
            <TableCell
              :colspan="columns.length"
              class="h-24 text-center"
            >
              Nenhuma tarefa encontrada.
            </TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </div>

    <div class="flex items-center justify-end space-x-2 py-4">
      <div class="flex-1 text-sm text-muted-foreground">
        {{ table.getFilteredSelectedRowModel().rows.length }} de
        {{ table.getFilteredRowModel().rows.length }} linha(s) selecionada(s).
      </div>
      <div class="space-x-2">
        <Button
          variant="outline"
          size="sm"
          :disabled="!table.getCanPreviousPage()"
          @click="table.previousPage()"
        >
          Anterior
        </Button>
        <Button
          variant="outline"
          size="sm"
          :disabled="!table.getCanNextPage()"
          @click="table.nextPage()"
        >
          Próxima
        </Button>
      </div>
    </div>
  </div>
</template>
