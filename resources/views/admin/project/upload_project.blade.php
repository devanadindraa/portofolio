@extends('admin.master_admin')
@section('container')
<main>
    <div class="container">
        <a href="{{ route('admin.show_project') }}" style="text-decoration: none; color: black;">
            <i class="fas fa-arrow-left" style="font-size: 20px;"></i>
        </a>
        <h2 class="header-admin">Upload Project</h2>
        <form action="{{ route('admin.store_project') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="project_name">Project Name</label>
                <input type="text" id="project_name" name="project_name" required>
            </div>
    
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div>
                <label for="project_url">Project URL</label>
                <input type="text" id="project_url" name="project_url"></input>
            </div>
    
            <div>
                <label for="images">Upload Images</label>
                <input type="file" id="images" name="images[]" multiple required>
            </div>
    
            <button type="submit">Upload</button>
        </form>
    
    </div>
</main>
@endsection