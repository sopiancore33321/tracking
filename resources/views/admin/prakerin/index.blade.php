@extends("layouts.master")
@section('content')
<div class="row">
	<div class="col-md-12 col-md-offset-2">
        <a href="{{ route("prakerin.create") }}"><i class="fas fa-plus-circle"></i>Tambah Data</a>
        <div class="box">
			<div class="box-body">

				@if(Session::has('sukses'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					{{ Session::get('sukses') }}
				</div>
				@endif

				@if(Session::has('gagal'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
					{{ Session::get('gagal') }}
				</div>
				@endif

				<table class="table table-prakerin table-stripped">

                    
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style='text-align:center;vertical-align:middle'>Lokasi</th>
                            <th style='text-align:center;vertical-align:middle'>Rw</th>
                            <th style='text-align:center;vertical-align:middle'>positif</th>
                            <th style='text-align:center;vertical-align:middle'>negatif</th>
                            <th style='text-align:center;vertical-align:middle'>Meninggal</th>
                            <th style='text-align:center;vertical-align:middle'>sembuh</th>
                            <th style='text-align:center;vertical-align:middle'>tanggal</th>
                            
                            <center>
                                <th style='text-align:center;vertical-align:middle' colspan="3">Action</th>
                            </center>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($prakerin as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td style='text-align:center;vertical-align:middle'>Kelurahan : {{$data->rw->kelurahan->nama_provinsi}}<br>Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}</td>
                            <td style='text-align:center;vertical-align:middle'>{{$data->rw->nama_rw}}</td>
                            <td style='text-align:center;vertical-align:middle'>{{$data->jumlah_positif}}</td>
                            <td style='text-align:center;vertical-align:middle'>{{$data->jumlah_sembuh}}</td>
                            <td style='text-align:center;vertical-align:middle'>{{$data->jumlah_meninggal}}</td>
                            <td style='text-align:center;vertical-align:middle'>{{$data->tanggal}}</td>
                            <td style='text-align:center;vertical-align:middle'><a href="{{route('prakerin.show',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a></td>
                            <td><a href="{{route('prakerin.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                            <td>
                                <form action="{{route('prakerin.destroy',$data->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            </tr>
                        </form>
                            @endforeach
                        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
