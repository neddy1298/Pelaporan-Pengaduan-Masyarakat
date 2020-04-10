@component('mail::message')
# Introduction

Hi example email by Neddy

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
