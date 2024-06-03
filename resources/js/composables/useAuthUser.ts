import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

export const useAuthUser = () => {
  const page = usePage();

  return computed(() => page.props.auth.user);
};
