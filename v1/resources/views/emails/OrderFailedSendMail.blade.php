@component('mail::message')
# Order Failed
Dear {{$content['name']??'Hello'}}<br>
Your order on {{ config('app.name') }} has been successfully placed. Please find the order summary below.<br>
Order ID: {{$content['order_number']??''}}<br>
Payment Status - {{$content['payment_status']??''}}<br>
Payment mode - {{$content['gateway_name']??''}}<br>
Total Items - {{$content['total_items']??''}}<br>
Total Amount - {{$content['currency']??''}} {{$content['amount']??''}}<br>
Placed Date - {{$content['created_at']??''}}<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
