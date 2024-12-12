<div>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary'}}">
                    Semua Pengguna
                </button>
                <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary'}}">
                    Tambah Pengguna
                </button>
                <button wire:loading class="btn btn-info">
                    Loading ...
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu=='lihat')
                <div class="card border-primary">
                    <div class="card-header">
                        Semua Pengguna
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Data</th>
                            </thead>
                            <tbody>
                                @foreach ( $semuaPengguna as $pengguna )
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $pengguna->name}}</td>
                                    <td>{{ $pengguna->email}}</td>
                                    <td>{{ $pengguna->peran}}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $pengguna->id}})" class="btn {{ $pilihanMenu=='edit' ? 'btn-primary' : 'btn-outline-primary'}}">
                                            Edit Pengguna
                                        </button>
                                        <button wire:click="pilihHapus({{ $pengguna->id}})" class="btn {{ $pilihanMenu=='hapus' ? 'btn-danger' : 'btn-outline-primary'}}">
                                            Hapus Pengguna
                                        </button>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @elseif ($pilihanMenu=='tambah')
                <div class="card border-primary">
                    <div class="card-header">
                        Tambah Pengguna
                    </div>
                    <div class="card-body">
                        <form wire:submit='simpan'>
                            <label for=""> Nama </label>
                            <input type="text" class="form-control" wire:model='nama'/>
                            @error('nama')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <label for="" class="mt-2"> Email </label>
                            <input type="email" class="form-control" wire:model='email'/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <label for="" class="mt-2"> Password </label>
                            <input type="password" class="form-control" wire:model='password'/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <label for="" class="mt-2"> Pilih Peran </label>
                            <select name="" id="" class="form-control" wire:model='peran'>
                                <option value="">Pilih Peran</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Admin">Admin</option>
                            </select>
                            @error('peran')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <button type="submit" class="btn btn-primary mt-2 ">Simpan</button>
                        </form>
                    </div>
                </div>
                @elseif ($pilihanMenu=='edit')
                <div class="card border-primary">
                    <div class="card-header">
                        Edit Pengguna
                    </div>
                    <div class="card-body">
                    <form wire:submit='simpanEdit'>
                            <label for=""> Nama </label>
                            <input type="text" class="form-control" wire:model='nama'/>
                            @error('nama')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <label for="" class="mt-2"> Email </label>
                            <input type="email" class="form-control" wire:model='email'/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <label for="" class="mt-2"> Password </label>
                            <input type="password" class="form-control" wire:model='password'/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <label for="" class="mt-2"> Pilih Peran </label>
                            <select name="" id="" class="form-control" wire:model='peran'>
                                <option value="">Pilih Peran</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Admin">Admin</option>
                            </select>
                            @error('peran')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <button type="submit" class="btn btn-primary mt-2 ">SIMPAN</button>
                            <button type="button" wire:click='batal' class="btn btn-secondary mt-2 ">BATAL</button>
                        </form>
                    </div>
                </div>
                @elseif ($pilihanMenu=='hapus')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Hapus Pengguna
                    </div>
                    <div class="card-body">
                        Anda yakin akan menghapus Pengguna ini?
                        <p>Nama : {{$penggunaTerpilih->name}}</p>
                        <button class="btn btn-secondary" wire:click='batal'>BATAL</button>
                        <button class="btn btn-danger" wire:click='hapus'>HAPUS</button>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>