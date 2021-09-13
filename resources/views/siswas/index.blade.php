@extends('template')

@section('title')
<div class="float-left">
    <h2><b>Tabel Siswa</b></h2>
</div>
@endsection
 


@section('body')
    @if (Session::get('success'))
    

    @endif
    <a class="btn btn-outline-primary mt-4 float-right ml-3" href="{{ route('siswas.create') }}" style="width: 300px;"><span class="fas fa-plus"> Tambahkan Data</a>
    <table id="example2" class="table table-hover m-1" style="width:97%">
                  <thead>
                  <tr style="background-color: #007bff; color: white;" class="text-center">
                    <th width="20px" class="text-center">No</th>
                    <th>NISN </th>
                    <th width="500px">Nama </th>
                    <th>Foto</th>
                    <th width="500px">Kelas</th>
                    <th>Email</th>
                    <th width="100px;"class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($siswa as $post)
                  <tr class="text-center">
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ $post->nisn }}</td>
                    <td  width="900px">{{ $post->name }}</td>
                    <td><img src="{{$post->foto}}" class="m-3 rounded" alt="" width="100px" height="100px"></td>
                    
                    <td width="500px">{{ $post->kelas }}</td>
                    <td>{{ $post->email }}</td>
                    <td widht="800px">
                        <form action="{{ route('siswas.destroy',$post->id) }}" method="POST">
        
                            <a class="btn btn-primary btn-sm  far" style="font-family: 'Source Sans Pro', sans-serif;" href="{{ route('siswas.edit',$post->id) }}"><span class="fas fa-edit"></span></a>
        
                            @csrf
                            @method('DELETE')
        
                            <button type="submit" class="btn btn-danger btn-sm" style="font-family: 'Source Sans Pro', sans-serif;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><span class="fas fa-trash"></span></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>

    
 
    {!! $siswa->links() !!}
 
@endsection

@section('footer')
@endsection