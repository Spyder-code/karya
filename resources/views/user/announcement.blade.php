@extends('layouts.user')
@section('Tentang', 'block mt-4 mr-10  font-semibold text-blue-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Unggah', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Event', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('Baca', 'block mt-4 mr-10  font-semibold text-gray-500 lg:inline-block lg:mt-0 hover:text-blue-500')
@section('style')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection
@section('content')
<section class="relative w-full text-center h-30 mt-24 text-3xl" style="font-family: 'Quicksand', sans-serif;">
    <h1>Penggumuman Pemenang</h1>
    <h1>{{ $announcement->event->name }}</h1>
    <h1>{{ $announcement->event->level }}</h1>
</section>

<section class="p-10">
    {!! $announcement->note !!}
</section>

<section class="p-10">
    <h1 class="text-bold text-2xl">CATATAN PENJURIAN</h1><br>
    {!! $announcement->jury_note !!}
</section>

<section class="text-gray-900 tracking-wider px-10 pb-10 leading-normal">
    <table id="example" class="table-auto border-separate hover whitespace-normal text-left" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="1">No</th>
                <th data-priority="2">Nama Lengkap</th>
                <th data-priority="3">Judul Puisi</th>
                <th data-priority="4">Peringkat</th>
                <th data-priority="5">Instagram</th>
                <th data-priority="6">Institusi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->grade }}</td>
                <td>{{ $item->instagram }}</td>
                <td>{{ $item->institution }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
</html>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        		$(document).ready(function() {
			
			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );
    </script>
@endsection