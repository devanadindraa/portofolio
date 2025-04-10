@extends('admin.master_admin')
@section('container')
    <main>
        <div class="container">
            <a href="{{ route('admin.show_project') }}" style="text-decoration: none; color: black;">
                <i class="fas fa-arrow-left" style="font-size: 20px;"></i>
            </a>
            <h2 class="header-admin">Edit Project</h2>
            <form action="{{ route('admin.update_project', $project->project_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Input Nama Project --}}
                <div>
                    <label for="project_name">Project Name</label>
                    <input type="text" id="project_name" name="project_name" value="{{ $project->project_name }}" required>
                </div>

                {{-- Input Deskripsi --}}
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required>{{ $project->description }}</textarea>
                </div>
                {{-- Gambar Saat Ini --}}
                <div>
                    <label>Current Images</label>
                    <div class="image-gallery">
                        @foreach ($project->images as $image)
                            <div class="image-item" style="position: relative;">
                                <img src="{{ asset('storage/' . $image->img_url) }}" alt="Project Image"
                                    class="project-img">

                                {{-- Tombol Hapus dengan Ikon --}}
                                <button type="button" class="delete-btn" data-image-id="{{ $image->img_id }}">
                                    <i class='bx bx-trash'></i>
                                </button>

                                {{-- Checkbox Hidden untuk Submit --}}
                                <input type="hidden" name="delete_images[]" value="{{ $image->img_id }}" class="image-input"
                                    disabled>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Upload Gambar Baru --}}
                <div>
                    <label for="images">Upload New Images</label>
                    <input type="file" id="images" name="images[]" multiple>
                </div>

                <button type="submit">Submit</button>
            </form>

        </div>
    </main>
@endsection
