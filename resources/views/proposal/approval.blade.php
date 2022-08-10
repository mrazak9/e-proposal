<div class="col-md-12">
    @switch($proposal->owner)
        @case('HIMA')
            @can('PROPOSAL_APPROVAL_HIMA')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="1">
                    <div class="btn-group dropup">
                        @if (empty($getApproval2))
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA HIMA
                        </button>
                        @else
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" disabled>
                            <i class="bi bi-pen-fill"></i> KETUA HIMA
                        </button>
                        @endif
                        
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_PEMBINA')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="2">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> PEMBINA HIMA
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_KAPRODI')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="3">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA PRODI
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_REKTOR')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="4">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> REKTOR
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BAS')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="5">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> BAS
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
        @break

        @case('KSM')
            @can('PROPOSAL_APPROVAL_HIMA')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="1">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA HIMA
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_PEMBINA')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="2">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> PEMBINA HIMA
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_KAPRODI')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="3">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA PRODI
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_REKTOR')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="4">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> REKTOR
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BAS')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="5">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> BAS
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
        @break

        @case('UKM')
            @can('PROPOSAL_APPROVAL_BEM')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="1">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA BEM
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BPM')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="2">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA BPM
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_PEMBINA')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="3">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> PEMBINA MHS
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_REKTOR')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="4">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> REKTOR
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BAS')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="5">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> BAS
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
        @break

        @case('BPM')
            @can('PROPOSAL_APPROVAL_BPM')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="1">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> KETUA BPM
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_PEMBINA')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="2">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> PEMBINA MHS
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_REKTOR')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="3">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> REKTOR
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BAS')
                <form action="{{ route('admin.proposal.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                    <input type="hidden" name="level" value="4">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-pen-fill"></i> BAS
                        </button>
                        <div class="dropdown-menu">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="1"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="approved" value="0"
                                    onclick="this.form.submit();">
                                <label class="form-check-label">
                                    Tolak
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
        @break

        @case('BEM')
            @can('PROPOSAL_APPROVAL_BEM')
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                <input type="hidden" name="level" value="1">
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-pen-fill"></i> KETUA BEM
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="1"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="0"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Tolak
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BPM')
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                <input type="hidden" name="level" value="2">
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-pen-fill"></i> KETUA BPM
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="1"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="0"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Tolak
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            @endcan
            @can('PROPOSAL_APPROVAL_PEMBINA')
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                <input type="hidden" name="level" value="3">
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-pen-fill"></i> PEMBINA MHS
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="1"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="0"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Tolak
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            @endcan
            @can('PROPOSAL_APPROVAL_REKTOR')
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                <input type="hidden" name="level" value="4">
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-pen-fill"></i> REKTOR
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="1"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="0"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Tolak
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            @endcan
            @can('PROPOSAL_APPROVAL_BAS')
            <form action="{{ route('admin.proposal.process') }}" method="POST">
                @csrf
                <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                <input type="hidden" name="level" value="5">
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-pen-fill"></i> BAS
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="1"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="approved" value="0"
                                onclick="this.form.submit();">
                            <label class="form-check-label">
                                Tolak
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            @endcan
        @break

        @default
    @endswitch
</div>
