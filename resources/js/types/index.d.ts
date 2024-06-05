export interface User {
  name: string;
  email: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User;
  };
};

export type Todo = {
  id: string;
  title: string;
  is_completed: boolean;
  created_at: Date;
  updated_at?: Date;
}
