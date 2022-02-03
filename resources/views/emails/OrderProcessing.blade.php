@component('mail::message')
# Your Order {{$content['order_number']??''}} has been Processing!
Dear {{$content['name']??'Hello'}}<br>
Here's the happy news: Your order is being processed.<br>
Order ID: {{$content['order_number']??''}}<br>
Payment Status - {{$content['payment_status']??''}}<br>
Payment mode - {{$content['gateway_name']??''}}<br>
Total Items - {{$content['total_items']??''}}<br>
Total Amount - {{$content['currency']??''}} {{$content['amount']??''}}<br>
Placed Date - {{$content['created_at']??''}}<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent