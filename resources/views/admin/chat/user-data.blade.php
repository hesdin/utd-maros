@forelse ($users as $user)
    <tr>
        <td>
            <img src="{{ asset('f/avatar/' . $user->userPengirim->foto) }}" alt="" class="avatar">
        </td>
        <td>{{ $user->userPengirim->nama }}</td>
        <td>{{ Str::limit($user->pesan, 25) }}</td>
        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
        <td>
            <button class="btn btn-outline btn-primary btn-sm"
                onclick="document.location.href = '{{ route('chat-user', $user->userPengirim->id) }}'">Balas</button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center">Tidak ada pesan</td>
    </tr>
@endforelse
