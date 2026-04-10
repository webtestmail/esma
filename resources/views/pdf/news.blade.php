<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{!! html_entity_decode($news->name) !!}</title>

<style>
body{
    font-family: DejaVu Sans, sans-serif;
    font-size:13px;
    color:#222;
    line-height:1.6;
}

h1{
    font-size:24px;
    margin-bottom:15px;
    text-align:center;
    border-bottom:2px solid #ddd;
    padding-bottom:8px;
}

.section{
    margin-bottom:18px;
}

img{
    width:100%;
}

.gallery{
    width:100%;
}



.gallery img:nth-child(3n){
    margin-right:0;
}

.clearfix{
    clear:both;
}

.meta{
    margin-top:25px;
    padding-top:12px;
    border-top:1px solid #ccc;
}

.meta p{
    margin:4px 0;
}

.heading{
    font-weight:bold;
    margin-bottom:5px;
}

</style>
</head>

<body>

<h1>{!! $news->name !!}</h1>

<div class="section">
{!! html_entity_decode($news->breadcrumb_description) !!}
</div>

@if(!empty($news->banner))
<div class="section">
    <img src="{{ public_path($news->banner) }}">
</div>
@endif

<div class="section">
{!! $news->subtitle !!}
</div>

@if(!empty($news->image))
<div class="section">
    <img src="{{ public_path($news->image) }}">
</div>
@endif

<div class="section">
{!! html_entity_decode($news->short_description) !!}
</div>

@if(!empty($news->image1))
<div class="section">
    <img src="{{ public_path($news->image1) }}">
</div>
@endif

<div class="section">
{!! html_entity_decode($news->description) !!}
</div>

@if(!empty($news->more_images))
@php
    $images = json_decode($news->more_images,true);
    $chunks = array_chunk($images, 3);
@endphp

<div class="section">
<table width="100%" cellpadding="5" cellspacing="0">
@foreach($chunks as $row)
<tr>
    @foreach($row as $img)
    <td width="33%" align="center">
        <img src="{{ public_path($img) }}" style="width:100%; height:auto;">
    </td>
    @endforeach

    @if(count($row) < 3)
        @for($i = count($row); $i < 3; $i++)
            <td width="33%"></td>
        @endfor
    @endif
</tr>
@endforeach
</table>
</div>
@endif

<div class="section">
{!! html_entity_decode($news->full_description) !!}
</div>

@if(!empty($news->website_name))
<div class="section">
<p><strong> Website Name:</strong> {{ $news->website_name }}</p>
<p><strong>URL:</strong> {{ $news->website_url }}</p>
</div>
@endif

<div class="meta">
<p><strong>Publication date:</strong> {{ $news->created_at? $news->created_at->format('M, Y'):'' }}</p>
<p><strong>Tags:</strong> {{ $news->tags }}</p>
<p><strong>Published by:</strong> {{ $news->published_by }}</p>
</div>

</body>
</html>
