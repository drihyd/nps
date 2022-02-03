@component('mail::message')
# Great Choice!
Dear {{$content['name']??'Hello'}}<br>
Use it for yourself or gift it to a loved one.<br>
Below is your voucher code.<br>
Voucher code: {{$content['voucher_code']??''}}<br>
Order ID: {{$content['order_number']??''}}<br>
Voucher Amount - {{$content['currency']??''}} {{$content['amount']??''}}<br>
Generated Date - {{$content['created_at']??''}}<br>
<p>
Regards,<br>
{{ config('app.name') }}
@endcomponent
