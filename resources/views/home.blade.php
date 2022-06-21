@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>Home</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Pengumuman!</h4>
                        Belum ada

                        <hr>
                        <p class="mb-0">Jika menemui kendala klik <a class="alert-link" href="https://lpkia.ac.id/helpdesk"
                                target="_blank">link ini</a></p>
                    </div>
                    <div
                        style="position: relative; width: 100%; height: 0; padding-top: 56.2500%;
     padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
     border-radius: 8px; will-change: transform;">
                        <iframe loading="lazy"
                            style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFC_19ik7E&#x2F;view?embed"
                            allowfullscreen="allowfullscreen" allow="fullscreen">
                        </iframe>
                    </div>
                    <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFC_19ik7E&#x2F;view?utm_content=DAFC_19ik7E&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link"
                        target="_blank" rel="noopener"></a>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @parent
    @endsection
