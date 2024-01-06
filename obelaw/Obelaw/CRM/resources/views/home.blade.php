<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Pipeline
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-lead">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Add lead
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <ul class="nav nav-bordered mb-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">View all</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Marketing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Development</a>
                </li>
            </ul>
            <div class="row">
                <div class="col-12 col-md-6 col-lg">
                    <h2 class="mb-3 text-yellow">
                        New
                        <span class="badge bg-yellow" style="float: right;">
                            10000
                        </span>
                    </h2>
                    <div class="mb-4">
                        <div class="row row-cards">
                            <div class="col-12">
                                @foreach ($news as $new)
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <h3 class="card-title">
                                                <a href="{{ route('obelaw.crm.leads.show', [$new]) }}">
                                                    {{ $new->contact->name }}
                                                </a>
                                            </h3>
                                            <div class="text-muted">Dedicated form for a category of users that will
                                                perform actions.</div>
                                            <div class="mt-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="avatar-list avatar-list-stacked">
                                                            <span class="avatar avatar-xs rounded"
                                                                style="background-image: url(./static/avatars/000f.jpg)"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="link-warning">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                                <path d="M16 3v4" />
                                                                <path d="M8 3v4" />
                                                                <path d="M4 11h16" />
                                                                <path d="M11 15h1" />
                                                                <path d="M12 15v3" />
                                                            </svg>
                                                            10 Sep
                                                        </a>
                                                    </div>
                                                    <div class="col-auto text-muted">
                                                        <button class="switch-icon switch-icon-scale"
                                                            data-bs-toggle="switch-icon">
                                                            <span class="switch-icon-a text-muted">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                            </span>
                                                            <span class="switch-icon-b text-red">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-filled" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                        6
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="link-muted">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/share -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                                <path d="M8.7 10.7l6.6 -3.4" />
                                                                <path d="M8.7 13.3l6.6 3.4" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg">
                    <h2 class="mb-3 text-orange">
                        Becoming
                        <span class="badge bg-orange" style="float: right;">
                            10000
                        </span>
                    </h2>
                    <div class="mb-4">
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h3 class="card-title">User should receive a daily digest email</h3>
                                        <div class="text-muted">Dedicated form for a category of users that will
                                            perform actions.</div>
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <span class="avatar avatar-xs rounded"
                                                            style="background-image: url(./static/avatars/000f.jpg)"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="link-warning">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                            <path d="M16 3v4" />
                                                            <path d="M8 3v4" />
                                                            <path d="M4 11h16" />
                                                            <path d="M11 15h1" />
                                                            <path d="M12 15v3" />
                                                        </svg>
                                                        10 Sep
                                                    </a>
                                                </div>
                                                <div class="col-auto text-muted">
                                                    <button class="switch-icon switch-icon-scale"
                                                        data-bs-toggle="switch-icon">
                                                        <span class="switch-icon-a text-muted">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                            </svg>
                                                        </span>
                                                        <span class="switch-icon-b text-red">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-filled" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    6
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="link-muted">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/share -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M8.7 10.7l6.6 -3.4" />
                                                            <path d="M8.7 13.3l6.6 3.4" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg">
                    <h2 class="mb-3 text-blue">
                        Offer
                        <span class="badge bg-blue" style="float: right;">
                            10000
                        </span>
                    </h2>
                    <div class="mb-4">
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h3 class="card-title">User should receive a daily digest email</h3>
                                        <div class="text-muted">Dedicated form for a category of users that will
                                            perform actions.</div>
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <span class="avatar avatar-xs rounded"
                                                            style="background-image: url(./static/avatars/000f.jpg)"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="link-warning">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                            <path d="M16 3v4" />
                                                            <path d="M8 3v4" />
                                                            <path d="M4 11h16" />
                                                            <path d="M11 15h1" />
                                                            <path d="M12 15v3" />
                                                        </svg>
                                                        10 Sep
                                                    </a>
                                                </div>
                                                <div class="col-auto text-muted">
                                                    <button class="switch-icon switch-icon-scale"
                                                        data-bs-toggle="switch-icon">
                                                        <span class="switch-icon-a text-muted">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                            </svg>
                                                        </span>
                                                        <span class="switch-icon-b text-red">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-filled" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    6
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="link-muted">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/share -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M8.7 10.7l6.6 -3.4" />
                                                            <path d="M8.7 13.3l6.6 3.4" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg">
                    <h2 class="mb-3 text-green">
                        Done
                        <span class="badge bg-green" style="float: right;">
                            10000
                        </span>
                    </h2>
                    <div class="mb-4">
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h3 class="card-title">User should receive a daily digest email</h3>
                                        <div class="text-muted">Dedicated form for a category of users that will
                                            perform actions.</div>
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <span class="avatar avatar-xs rounded"
                                                            style="background-image: url(./static/avatars/000f.jpg)"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="link-warning">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                            <path d="M16 3v4" />
                                                            <path d="M8 3v4" />
                                                            <path d="M4 11h16" />
                                                            <path d="M11 15h1" />
                                                            <path d="M12 15v3" />
                                                        </svg>
                                                        10 Sep
                                                    </a>
                                                </div>
                                                <div class="col-auto text-muted">
                                                    <button class="switch-icon switch-icon-scale"
                                                        data-bs-toggle="switch-icon">
                                                        <span class="switch-icon-a text-muted">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                            </svg>
                                                        </span>
                                                        <span class="switch-icon-b text-red">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-filled" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    6
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="link-muted">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/share -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                            <path d="M8.7 10.7l6.6 -3.4" />
                                                            <path d="M8.7 13.3l6.6 3.4" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-lead" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <livewire:obelaw-crm-leads-create />
            </div>
        </div>
    </div>
</div>
