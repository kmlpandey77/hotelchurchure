@component('mail::message')
# Contact Form

Date **{{ date('F d, Y') }}** <br>
IP Address: **{{ request()->ip() }}**

======================================

**Name:** {{ $request->name }} <br>
**Email:** {{ $request->email }} <br>

<b>Message</b> <br>
"{{ nl2br($request->message) }}"


Thanks,<br>
{{ config('app.name') }}
@endcomponent
