@extends('layouts.admin')

@section('title', 'Pengguna')

@section('content')
<div class="min-h-screen bg-slate-100">
    <div class="max-w-7xl mx-auto">
        <!-- HEADER -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800">Pengguna</h1>
                <p class="text-sm text-slate-500">Manajemen pengguna sistem.</p>
            </div>
            <a href="{{ route('admin.pengguna.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white text-sm font-bold rounded-xl shadow-md transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Pengguna
            </a>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse($users as $user)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $user->username }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $user->role === 'admin' ? 'Admin' : 'Operator' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.pengguna.edit', ['user' => $user->id]) }}" class="text-emerald-600 hover:text-emerald-900 mr-3">Edit</a>
                                <form method="POST" action="{{ route('admin.pengguna.destroy', ['user' => $user->id]) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-slate-500">Belum ada pengguna.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
