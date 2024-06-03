import { usePage } from "@inertiajs/vue3";

export const useAuthUser = () => {
  const page = usePage();

  return page.props.auth.user;
};
