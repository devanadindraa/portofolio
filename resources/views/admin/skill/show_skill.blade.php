@extends('admin.master_admin')
@section('container')
    <main>
        <div class="container">
            <div class="header-section"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 class="header-admin">List of Skills</h2>
                <a href="{{ route('admin.create_skill') }}" class="btn-add-project"
                    style="display: flex; align-items: center; gap: 8px; color: white; padding: 10px 15px; border-radius: 8px; text-decoration: none;">
                    <span style="font-size: 20px; font-weight: bold;">+</span> Add Skills
                </a>
            </div>

            @if ($skills->isEmpty())
                <p>No Skills available.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Skill Name</th>
                            <th style="width: 20%;">Skill Ratio</th>
                            <th style="width: 20%;">Skill Period</th>
                            <th style="width: 25%;">Images</th>
                            <th style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $skill->skill_name }}</td>
                                <td>{{ $skill->skill_ratio }}%</td>
                                <td>{{ $skill->experience }} {{ $skill->period }}</td>
                                <td>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $skill->img_url) }}" alt="Skill Image"
                                            class="skill-img" style="width: 80%; border-radius: 8px;">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit_skill', $skill->skill_id) }}"
                                        class="bx bx-edit btn-edit"></a>
                                    <form action="{{ route('admin.skill.destroy', $skill->skill_id) }}" method="POST"
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