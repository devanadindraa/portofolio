@extends('admin.master_admin')
@section('container')
<main>
    <div class="container">
        <a href="{{ route('admin.show_certif') }}" style="text-decoration: none; color: black;">
            <i class="fas fa-arrow-left" style="font-size: 20px;"></i>
        </a>
        <h2 class="header-admin">Upload Certificate</h2>
        <form action="{{ route('admin.store_certif') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="certif_name">Certificate Name</label>
                <input type="text" id="certif_name" name="certif_name" required>
            </div>
    
            <div>
                <label for="certif_link">Certificate Link</label>
                <input type="text" id="certif_link" name="certif_link"></input>
            </div>
    
            <div>
                <label for="img_url">Upload Images</label>
                <input type="file" id="img_url" name="img_url" accept="image/*">
            </div>
    
            <button type="submit">Upload</button>
        </form>
    
    </div>
</main>
@endsection