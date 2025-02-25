@php
   $detail = $researchProposal->researchProposalsDetail;
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Ringkasan:</label>
            <textarea id="editor300" class="form-control" name="summary" cols="30" rows="5">{{ $detail->summary??'' }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Latar Belakang:</label>
            <textarea id="editor500" class="form-control" name="background" cols="30" rows="10">{{ $detail->background??'' }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Kata Kunci:</label>
            <input id="tags" type="text" name="keyword" class="form-control" placeholder="Contoh: teknologi, bisnis, kesehatan" value="{{ $detail->keyword??'' }}" required>
            <small class="text-danger">*(Maksimal 5 tag, pisahkan dengan koma)</small>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>State of the Art:</label>
            <textarea id="tinymce" name="state_of_the_art" class="form-control" cols="30" rows="5">{{ $detail->state_of_the_art??'' }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Roadmap Penelitian:</label>            
            <input type="file" name="attachment"><br>
            <small class="text-danger">
                Lampiran <a
                    href="/data_roadmap/{{ $researchProposal->researchProposalsDetail->attachment??'' }}">
                    {{ $researchProposal->researchProposalsDetail->attachment??''}}  <i class="fas fa-paperclip"></i>
                </a>
            </small>
            <textarea id="editor600" name="road_map_research" class="form-control" cols="30" rows="6">{{ $detail->road_map_research??'' }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Metode dan Desain Penelitian:</label>
            <textarea id="tinymce" name="method_and_design" class="form-control" cols="30" rows="6">{{ $detail->method_and_design??'' }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Daftar Pustaka:</label>
            <textarea id="tinymce" name="references" class="form-control" cols="30" rows="4">{{ $detail->references??'' }}</textarea>
        </div>
    </div>
</div>