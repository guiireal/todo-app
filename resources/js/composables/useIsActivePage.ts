import { usePage } from "@inertiajs/vue3";

export const useIsActivePage = () => {
  const page = usePage();

  return (routeName: string) => route(routeName) === `${window.location.origin}${page.url}`;
};
