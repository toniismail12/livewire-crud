<div class="container ">
    <figure class="text-center mt-3">
        <blockquote class="blockquote">
          <p>Laravel 8.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          Livewire Crud <cite title="Source Title">Single Page</cite>
        </figcaption>
      </figure>
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="card my-3">
                <div class="card-body">
                    <div class="row g-3 justify-content-center">
                        
                        <div class="form-floating mb-3 col-6 col-lg-6">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" wire:model="email">
                            <label for="floatingInput">Email address</label>
                            @error('email') 
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-floating col-6 col-lg-6">
                            <input type="username" class="form-control" id="floatingUsername" placeholder="username" wire:model="username">
                            <label for="floatingUsername">Username</label>
                            
                            @error('username') 
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-floating col-6 col-lg-6">
                            <input type="text" class="form-control" id="floatingName" placeholder="Nama" wire:model="name">
                            <label for="floatingName">Nama</label>
                            
                            @error('name') 
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="form-floating col-6 col-lg-6">
                            <input type="date" class="form-control" id="floatingttl" placeholder="Tanggal Lahir" wire:model="tanggal_lahir">
                            <label for="floatingttl">Tanggal Lahir</label>
                            
                            @error('tanggal_lahir') 
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                          </div>

                        <div class="row ">
                            <div class="col-12 ps-0 text-left mt-2">
                                @if ($tombolupdate == '')
                                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="store()"><i class="bi bi-check2-circle"></i> Simpan</button>
                                @else 
                                <button type="button" class="btn btn-success btn-sm" wire:click.prevent="update()"><i class="bi bi-check2-circle"></i> Update</button>

                                <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="cancel()"><i class="bi bi-check2-circle"></i> Cancel</button>
                                @endif
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (session()->has('message'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
              
            @endif
            
            <table class="table table-bordered table-responsive bg-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Action</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                   
                   @foreach ($data as $item)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>  
                            <button class="btn btn-success btn-sm" wire:click.prevent="edit({{ $item->id }})"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger btn-sm" wire:click.prevent="hapus({{ $item->id }})"><i class="bi bi-trash"></i></button>
                        </td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>