@extends('admin.master_admin')
@section('container')
<main>
    <div class="container">
        <a href="{{ route('admin.show_skill') }}" style="text-decoration: none; color: black;">
            <i class="fas fa-arrow-left" style="font-size: 20px;"></i>
        </a>
        <h2 class="header-admin">Upload Skill</h2>
        <form action="{{ route('admin.store_skill') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="skill_name">Skill Name</label>
                <input type="text" id="skill_name" name="skill_name" required>
            </div>
            <div style="display: flex; align-items: center; gap: 5px;">
                <label for="experience">Experience</label>
                <input type="number" id="experience" name="experience" min="1" style="width: 80px; text-align: right;">
                <select name="period" id="period" style="height: 45px; text-align: center; border-radius: 10px">
                    <option value="DAYS">DAYS</option>
                    <option value="WEEKS">WEEKS</option>
                    <option value="MONTHS">MONTHS</option>
                    <option value="YEARS">YEARS</option>
                </select>
            </div>  
            <div style="display: flex; align-items: center; gap: 5px;">
                <label for="skill_ratio">Skill Ratio</label>
                <input type="number" id="skill_ratio" name="skill_ratio" min="0" max="100" step="10" style="width: 80px; text-align: right;">
                <span>%</span>
            </div>            
    
            <div>
                <label for="img_url">Upload Images</label>
                <input type="file" id="img_url" name="img_url" accept="image/svg+xml">
            </div>
    
            <button type="submit">Upload</button>
        </form>
    
    </div>
</main>
@endsection