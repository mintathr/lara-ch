git push dari local,
push with https => git push origin
push with ssh => git push github
cek remote git remote -v

bila error "hint: You have divergent branches and need to specify how to reconcile them."
git config --global  pull.ff true

composer diagnose -vvv

https://medium.com/@dennissmink/laravel-create-auth-lock-screen-11d6014fb8a1

composer require realrashid/sweet-alert
php artisan sweetalert:publish

https://www.positronx.io/create-multi-auth-authentication-in-laravel/

@isset($url)
   <form method="POST" action='{{ url("admin/login/$url") }}' aria-label="{{ __('Login') }}">
@else
   <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
@endisset

You want to know what routes are actually behind Auth::routes()?

From Laravel 7, it�s in a separate package, so check the file


/vendor/laravel/ui/src/AuthRouteMethods.php.

\ui\auth-backend\AuthenticatesUsers.php

git push -u origin main

token 20240324
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