<!-- Modal Message -->
<div id="messageModal">
    <div class="modal-box">
        <h2 id="modalMessageTitle"></h2>
        <p id="modalMessageContent"></p>
        <button onclick="closeMessageModal()">Close</button>
    </div>
</div>

<script>
    // Buka Modal Messages
    function openMessageModal(title = "Message", content = "No messages.") {
        const modal = document.getElementById('messageModal');
        document.getElementById('modalMessageTitle').innerText = title;
        document.getElementById('modalMessageContent').innerHTML = content;
        modal.classList.add('active');
    }

    // Tutup Modal Messages
    function closeMessageModal() {
        document.getElementById('messageModal').classList.remove('active');
    }

    // Otomatis Buka Modal jika Ada Session
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('messageModal')) {
            @if (session('success'))
                openMessageModal('Success', `{!! session('success') !!}`);
            @elseif (session('error'))
                openMessageModal('Error', `{!! session('error') !!}`);
            @elseif (session('info'))
                openMessageModal('Info', `{!! session('info') !!}`);
            @elseif ($errors->any())
                let errorMessages =
                    `@foreach ($errors->all() as $error) <p>{{ $error }}</p> @endforeach`;
                openMessageModal('Validation Errors', `<p>${errorMessages}</p>`);
            @endif
        }
    });
</script>
