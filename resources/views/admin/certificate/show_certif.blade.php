@extends('admin.master_admin')
@section('container')
    <main>
        <div class="container">
            <div class="header-section"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 class="header-admin">List of Certificates</h2>
                <a href="{{ route('admin.create_certif') }}" class="btn-add-project"
                    style="display: flex; align-items: center; gap: 8px; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none;">
                    <span style="font-size: 20px; font-weight: bold;">+</span> Add Certificate
                </a>
            </div>

            @if ($certificates->isEmpty())
                <p>No certificates available.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Certificate Name</th>
                            <th style="width: 30%;">Certificate Link</th>
                            <th style="width: 45%;">Images</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $certificate->certif_name }}</td>
                                <td>{{ $certificate->certif_link }}</td>
                                <td>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $certificate->img_url) }}" alt="Certificate Image"
                                            class="project-img" style="width: 80%; border-radius: 8px;">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit_certif', $certificate->certif_id) }}"
                                        class="bx bx-edit btn-edit"></a>
                                    <form action="{{ route('admin.certif.destroy', $certificate->certif_id) }}" method="POST"
                                        class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bx bx-trash btn-delete"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
@endsection