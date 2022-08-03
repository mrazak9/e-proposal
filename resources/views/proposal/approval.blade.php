<div class="col-md-12">
    @switch($proposal->owner)
        @case('HIMA')
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                    <label><h6><i class="bi bi-pen-fill"></i> KETUA HIMA</h6></label>
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="1">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="1" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Setuju
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="0" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Tolak
                      </label>
                    </div>
            </form>
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                    <label><h6><i class="bi bi-pen-fill"></i> PEMBINA HIMA</h6></label>
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="2">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="1" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Setuju
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="0" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Tolak
                      </label>
                    </div>
            </form>
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                    <label><h6><i class="bi bi-pen-fill"></i> KETUA PRODI</h6></label>
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="1" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Setuju
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="0" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Tolak
                      </label>
                    </div>
            </form>
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                    <label><h6><i class="bi bi-pen-fill"></i> REKTOR</h6></label>
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="4">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="1" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Setuju
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="0" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Tolak
                      </label>
                    </div>
            </form>
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                    <label><h6><i class="bi bi-pen-fill"></i> BAS</h6></label>
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="5">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="1" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Setuju
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="approved" value="0" onclick="this.form.submit();">
                      <label class="form-check-label">
                        Tolak
                      </label>
                    </div>
            </form>
            @break
        @case('UKM')
            <button class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i> KETUA BEM</button>
            <button class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i> KETUA BPM</button>
            <button class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i> PEMBINA</button>
            <button class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i> REKTOR</button>
            <button class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i> BAS</button>
            @break
    
        @default
            
    @endswitch
</div>