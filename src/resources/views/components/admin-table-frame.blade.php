<h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
    {{ $title }}
</h2>
<div>
    <button class="btn btn-primary my-2" onclick="location.href='{{ route($route) }}'">新規作成</button>
</div>
<table class="table table-striped">
    {{ $slot }}
</table>
