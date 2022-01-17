@component('mail::message')
# Order number {{$content['order_number']??''}} has been confirmed!
Dear {{$content['name']??'Hello'}}<br>
Your order on {{ config('app.name') }} has been successfully placed. Please find the order summary below.<br>
Order ID: {{$content['order_number']??''}}<br>
Payment Status - {{$content['payment_status']??''}}<br>
Payment mode - {{$content['gateway_name']??''}}<br>
Total Items - {{$content['total_items']??''}}<br>
Total Amount - {{$content['currency']??''}} {{$content['amount']??''}}<br>
Placed Date - {{$content['created_at']??''}}<br>
<p>
Ship to:<br>
{{$content['name']??'Hello'}}<br>
{{$content['ship_to_address']??''}}<br>
{{$content['ship_to_city']??''}},{{$content['ship_to_state']??''}} {{$content['ship_to_postalcode']??''}}<br>
{{$content['ship_to_phone']??''}}<br>
{{$content['ship_to_country']??''}}<br>
</p>
Regards,<br>
{{ config('app.name') }}
@endcomponent
