@extends('beautymail::templates.widgets')

@section('content')
	@include('beautymail::templates.widgets.newfeatureStart')

		<h4 class="secondary"><strong>Hai, {{ $name }}</strong></h4>
		<p>Terima kasih telah ikut berpartisipasi pada ajang {{ $event->name }}</p>
		<p>Silahkan unduh sertifikat kamu dibawah ini.</p>
		<br><br>
		<p>Salam,</p>
		<p>Tim Fun Bahasa</p>

	@include('beautymail::templates.widgets.newfeatureEnd')

@stop
