import { usePage } from "@inertiajs/vue3";

export const useIsActivePage = () => {
  const page = usePage();

  return {
    isActivePage: (routeName: string) => route(routeName) === `${window.location.origin}${page.url}`,
    onlyContainsActivePage: (routeName: string) => page.url.includes(routeName)
  };
};
