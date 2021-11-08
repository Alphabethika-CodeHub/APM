<!-- Contextual classes start -->
<section class="section">
    <div class="row" id="table-contexual">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="card-title mb-0"><i class="fas fa-border-all me-2"></i> Table Pengaduan</h4>
                </div>
                <div class="card-content">
                    <!-- table contextual / colored -->
                    <div style="overflow: scroll" class="table-responsive m-3 mt-0">
                        <table style="overflow: scroll" class="table table-responsive table-bordered mb-0 yajra-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Pengaduan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($c_data as $c)
                                    @if ($c->status == 'Process')
                                        <tr class="table-danger">
                                            <td class="text-bold-500">{{ $c->username }}</td>
                                            <td>{{ Str::limit($c->subject, 5, '...') }}</td>                                        
                                            <td>{{ $c->date->format('d-m-Y') }}</td>
                                            <td class="fw-bold"><i class="fas fa-circle" style="color: red"></i> {{ $c->status }}</td>
                                            <td>{{ $c->location }}</td>
                                            <td><a href="{{ URL('/detail/'.$c->id) }}"><i class="fas fa-paper-plane me-1"></i>Tanggapi</a></td>
                                        </tr>
                                    @elseif ($c->status == 'Pending')
                                        <tr class="table-warning">
                                            <td class="text-bold-500">{{ $c->username }}</td>
                                            <td>{{ Str::limit($c->subject, 5, '...') }}</td>                                        
                                            <td>{{ $c->date->format('d-m-Y') }}</td>
                                            <td class="fw-bold"><i class="fas fa-circle" style="color: orange"></i> {{ $c->status }}</td>
                                            <td>{{ $c->location }}</td>
                                            <td><a href="{{ URL('/detail/'.$c->id) }}"><i class="fas fa-times me-1"></i>Tanggapi</a></td>
                                        </tr>
                                    @elseif ($c->status == 'Completed')
                                        <tr class="table-info">
                                            <td class="text-bold-500">{{ $c->username }}</td>
                                            <td>{{ Str::limit($c->subject, 5, '...') }}</td>                                        
                                            <td>{{ $c->date->format('d-m-Y') }}</td>
                                            <td class="fw-bold"><i class="fas fa-circle" style="color: green"></i> {{ $c->status }}</td>
                                            <td>{{ $c->location }}</td>
                                            <td><a href="{{ URL('/detail/'.$c->id) }}"><i class="fas fa-check me-1"></i>Selesai</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                                {{ $c_data->links() }} --}}

                            </tbody>
                            {{-- <tbody>
                                <tr class="table-danger">
                                    <td class="text-bold-500">daffa123</td>
                                    <td>Terjadi Tawuran Di Jakarta...</td>
                                    <td>21/03/2020</td>
                                    <td class="fw-bold"><i class="fas fa-circle" style="color: red"></i> Process</td>
                                    <td>Jakarta</td>                                    
                                    <td><a href="#"><i class="fas fa-paper-plane me-1"></i>Tanggapi</a></td>
                                </tr>
                                <tr class="table-warning">
                                    <td class="text-bold-500">andi551</td>
                                    <td>Sekelompok Remaja Merusak...</td>
                                    <td class="text-bold-500">17/03/2020</td>
                                    <td class="fw-bold"><i class="fas fa-circle" style="color: orange"></i> Pending</td>
                                    <td>Bandung</td>
                                    <td><a href="#"><i class="fas fa-paper-plane me-1"></i>Tanggapi</a></td>
                                </tr>
                                <tr class="table-info">
                                    <td class="text-bold-500">andra4144</td>
                                    <td>Mobil Masuk Jurang...</td>
                                    <td class="text-bold-500">08/03/2020</td>
                                    <td class="fw-bold"><i class="fas fa-circle" style="color: green"></i> Completed</td>
                                    <td>Bekasi</td>
                                    <td><a href="#"><i class="fas fa-check-circle me-1"></i>Selesai</a></td>
                                </tr>
                                <tr class="table-info">
                                    <td class="text-bold-500">andra4144</td>
                                    <td>Mobil Masuk Jurang...</td>
                                    <td class="text-bold-500">08/03/2020</td>
                                    <td class="fw-bold"><i class="fas fa-circle" style="color: green"></i> Completed</td>
                                    <td>Bekasi</td>
                                    <td><a href="#"><i class="fas fa-check-circle me-1"></i>Selesai</a></td>
                                </tr>
                                <tr class="table-info">
                                    <td class="text-bold-500">andra4144</td>
                                    <td>Mobil Masuk Jurang...</td>
                                    <td class="text-bold-500">08/03/2020</td>
                                    <td class="fw-bold"><i class="fas fa-circle" style="color: green"></i> Completed</td>
                                    <td>Bekasi</td>
                                    <td><a href="#"><i class="fas fa-check-circle me-1"></i>Selesai</a></td>
                                </tr>
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contextual classes end -->