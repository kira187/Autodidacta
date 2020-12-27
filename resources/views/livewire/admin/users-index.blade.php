<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="resetPage" wire:model="search" class="form-control w-100" placeholder="Buscar usuario">
        </div>
        
        @if ($users->count())
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th width ="10px">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}">Editar</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong> No se encontraron resultados...</strong>
            </div>
        @endif
        
    </div>
</div>
