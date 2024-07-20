@component('mail::message')

<h1>We're excited to have you here {{ $firstname }}!</h1>
<p>Your account has been successfully created.</p>
<p>Sign into your account to access {{ config('app.name') }}. Please use credential below.</p>

<p>Email:</p>
<h3>{{ $email }}</h3>
<p>Password:</p>
<h3>{{ $password }}</h3>

@component('mail::button', ['url' => env('ALLOWED_ORIGINS') . '/login?email=' .$email, 'color' => 'primary'])
Sign in
@endcomponent

<h1>If this wasn't you</h1>
<p>Rest assured, no action is needed at the moment as your email still requires verification. Additionally, please remember not to share any OTPs you may receive with anyone.</p>

@component('mail::subcopy')
<p>This notification has been sent to the email address associated with your {{ config('app.name') }} account.</p>
<p>This email message was auto-generated. Please do not respond. If you need additional help, please visit {{ config('app.name') }} Support.</p>
@endcomponent


@component('mail::panel')
<p>Thanks,</p>
<p>{{ config('app.name') }} Team</p>
@endcomponent

@endcomponent