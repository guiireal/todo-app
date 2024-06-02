<x-mail::message>
  # Login automático

  Olá! Você está recebendo este e-mail porque solicitou um login automático em nossa plataforma.

  <x-mail::button :url="$url">
    Clique aqui para acessar sua conta
  </x-mail::button>

  Se você não solicitou um login automático, nenhuma ação é necessária.

  Atenciosamente,<br>
  {{ config('app.name') }}
</x-mail::message>
