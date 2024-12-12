<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-body">
                        <h4 class="card-title">Laporan Transaksi</h4>
                        <a href="{{ url('/cetak') }}" class="btn btn-secondary my-1" target="_blank">CETAK DISINI</a> 
                        <a href="{{url('/myPDF')}}" class="btn btn-primary my-2"> CETAK PDF </a>
                        <table class="table table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No Inv.</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @foreach ($semuaTransaksi as $Transaksi )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$Transaksi->created_at}}</td>
                                    <td>{{$Transaksi->kode}}</td>
                                    <td>Rp.{{number_format($Transaksi->total, 2, '.', ',')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>