@extends('admin.master_admin')
@section('container')
    <main>
        <div class="container">
            <div class="header-section"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 class="header-admin">List of Projects</h2>
                <a href="{{ route('admin.create_project') }}" class="btn-add-project"
                    style="display: flex; align-items: center; gap: 8px; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none;">
                    <span style="font-size: 20px; font-weight: bold;">+</span> Add Project
                </a>
            </div>

            @if ($projects->isEmpty())
                <p>No projects available.</p>
            @else
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Project Name</th>
                        <th style="width: 45%;">Description</th>
                        <th style="width: 30%;">Images</th>
                        <th style="width: 5%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>
                                <div class="swiper-container-project swiper-{{ $project->id }}" data-swiper-id="{{ $project->id }}">
                                    <div class="swiper-wrapper">
                                        @foreach ($project->images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $image->img_url) }}" alt="Project Image"
                                                    class="project-img" style="width: 80%; border-radius: 8px;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-project-pagination"></div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.edit_project', $project->project_id) }}" class="bx bx-edit btn-edit"></a>
                                <form action="{{ route('admin.project.destroy', $project->project_id) }}" method="POST" class="form-delete">
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
