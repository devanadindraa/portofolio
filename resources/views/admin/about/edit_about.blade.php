@extends('admin.master_admin')
@section('container')
    <main>
        <div class="container">
            <h2 class="header-admin">Edit About</h2>
            <form action="{{ route('admin.update_about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Pakai method PUT untuk update --}}

                {{-- Input Nama Project --}}
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $personals->name }}" required>
                </div>
                {{-- Input NIM --}}
                <div>
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" value="{{ $personals->nim }}" required>
                </div>
                {{-- Input Major --}}
                <div>
                    <label for="major">Major</label>
                    <input type="text" id="major" name="major" value="{{ $personals->major }}" required>
                </div>
                {{-- Input Faculty --}}
                <div>
                    <label for="faculty">Faculty</label>
                    <input type="text" id="faculty" name="faculty" value="{{ $personals->faculty }}" required>
                </div>
                {{-- Input Slogan --}}
                <div>
                    <label for="slogan">Slogan</label>
                    <textarea id="slogan" name="slogan" style="width: 100%; height: 150px;" required>{{ $personals->slogan }}</textarea>
                </div>
                {{-- Input Biography --}}
                <div>
                    <label for="biography">Biography</label>
                    <textarea id="biography" name="biography" style="width: 100%; height: 150px;" required>{{ $personals->biography }}</textarea>
                </div>
                {{-- Gambar Saat Ini --}}
                <div>
                    <label>Current Profile</label>
                    <div class="image-gallery">
                        <div class="image-item" style="position: relative;">
                            <img src="{{ asset('storage/' . $personals->img_url) }}" alt="Personal Image"
                                class="project-img">
                        </div>
                    </div>
                </div>
                {{-- Upload Gambar Baru --}}
                <div>
                    <label for="image_url">Upload New Images</label>
                    <input type="file" id="image_url" name="image_url" accept="image/*">
                </div>
                <button type="submit">Submit</button>
            </form>

        </div>
    </main>
@endsection
