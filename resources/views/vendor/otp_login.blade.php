@component('mail::message')

<h1>Hello {{ $firstname }},</h1>
<p>It looks like you are trying to log in your account. Here is One Time Password you need to access your account</p>
<div class="highlights">{{ $otp }}</div>

<h1>If this wasn't you</h1>
<p>This email was sent because someone attempted to log in to your account. The login attempt included your correct email and password.</p>
<p>If you are not trying to log in, we recommend that you <a href="/">update your password</a>.</p>
<p>The OTP code contained in this email is required to access your account. Your One Time Password is valid for 3 minutes. Please do not share it with anyone.</p>

@component('mail::subcopy')
<p>This notification has been sent to the email address associated with your {{ config('app.name') }} account.</p>
<p>This email message was auto-generated. Please do not respond. If you need additional help, please visit {{ config('app.name') }} Support.</p>
@endcomponent


@component('mail::panel')
<p>Thanks,</p>
<p>{{ config('app.name') }} Team</p>
@endcomponent

@endcomponent