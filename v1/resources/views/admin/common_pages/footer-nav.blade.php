@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
<div class="footerbar">
    <footer class="footer">
        <p class="mb-0">{{$theme_options_data->copyright??''}}</p>
    </footer>
</div>